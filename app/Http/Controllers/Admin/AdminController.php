<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Order;
use App\Model\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
   public function dashboard()
   {
       $order=Order::orderBy('created_at','desc')->get();
       $product=Product::all();
       $brand=Brand::all();
       $category=Category::all();
       $recent_product=$pro = Product::orderBy('created_at','desc')->get();
       $user=\App\User::where('roles','user')->orWhere('roles','wholeseller')->orderBy('created_at','desc')->get();
       $img=new Product();
      return view('backend/pages/index2',compact('img','order','product','brand','category','recent_product','user'));
}

public function wholesale_user(Request $request)
{
    if ($request->isMethod('get'))
    {
        $user=\App\User::all();
        return view('backend/pages/wholesale',compact('user'));
    }
    if ($request->isMethod('post'))
    {
//        dd($request->all());
        $request->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'email'=>'required|email',
           'phone'=>'required',
           'password'=>'required'
        ]);
        $new_user=new \App\User();
        $new_user->first_name=$request->first_name;
        $new_user->last_name=$request->last_name;
        $new_user->email=$request->email;
        $new_user->password=bcrypt($request->password);
        $new_user->phone=$request->phone;
        $new_user->verified=1;
        $new_user->roles="wholeseller";
        $new_user->save();
        return back()->with('success','Wholesale User created successfully!');
    }
}

public function admin_password(Request $request)
{
    if ($request->isMethod('get'))
    {
        return view('backend/pages/admin_password');

    }
    if ($request->ajax()) {

        $messages = [
            'old_password.required' => 'Please Enter Old Password',
            'new_password.required' => 'Please Enter New Password',
            'confirm_password.required' => 'Please Enter The New Password Again',
        ];

        $validatedData = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
        ], $messages);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()->all()], 406);
        }

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return response()->json(['errors' => 'Old Password not match'], 401);

        }
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return response()->json(['success' => 'Password changed'], 200);
    }

}


}
