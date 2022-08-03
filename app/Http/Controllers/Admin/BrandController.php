<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends BackendController
{
    public function manage_brand(Request $request)
    {
        if ($request->isMethod('get')) {
            $brand = Brand::all();
            return view($this->backendsetupPath . 'add_brand', compact('brand'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'brand_name' => 'required|unique:brands',
                'image' => 'required'
            ]);
            $data['brand_name'] = $request->brand_name;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/brands/');

                $image->move($destinationPath, $name);
                $data['brand_image'] = $name;
            }
            $create = Brand::create($data);
            if ($create){
                return redirect()->back()->with('success','Brand Added Successfully');
            }

        }

    }

    public function delete_brand(Request $request)
    {
        $id=$request->id;
        $del=Brand::findorfail($id);
          if ($del->products->count() > 0) {
                return redirect()->back()->with('error', 'Delete Products of this brand first');
            }
        if($this->delete_file($id)&&$del->delete())
        {
            return redirect()->back()->with('success','Brand deleted  successfully');
        }
    }
    public function delete_file($id)
    {
        $findData = Brand::findorfail($id);
        $fileName = $findData->brand_image;
        $deletePath = public_path('images/brands/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_brand(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $id=$request->id;
            $request->validate([
                'brand_name'=>'required',
            ]);
            $data['brand_name']=$request->brand_name;

            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/brands/');
                $image->move($destinationPath, $name);
                $data['brand_image'] = $name;
            }
            $create=Brand::findorfail($id);
            if ($create->update($data))
            {
                return redirect()->back()->with('success','Brand updated successfully');
            }
        }
    }
}
