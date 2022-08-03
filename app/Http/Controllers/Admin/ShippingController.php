<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use App\Model\Product;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ShippingController extends BackendController
{
    public function add_location()
    {
        $city=City::all();
        $shippings=Shipping::all();
        return view($this->backendPagePath . 'shipping/shipping',compact('city','shippings'));
    }

    public function post_location(Request $request){

        $shipping= new Shipping();
        $shipping->zip_code=0;
        $shipping->status = $request->status;
        $shipping->shipping_location = $request->city;
        $shipping->shipping_price = $request->shipping_rate;

        $shipping->save();
        return back()->with('success','Shipping location added');
    }

    public function delete_location(Request $request)
    {
        $find=Shipping::findorfail($request->id);
        $find->delete();
        return back()->with('success','Shipping Location deleted');
    }

    public function add_country(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $country=Country::all();
            return view($this->backendPagePath . 'shipping/country',compact('country'));

        }
        if ($request->isMethod('post'))
        {
           $country=new Country();
           $country->name=$request->country;
           $country->save();
            return back()->with('success','Country added');

        }
    }

    public function edit_country(Request $request)
    {
        $id=$request->id;
        $data['name']   =$request->country;
        $find=Country::where('id',$id)->first();
        if ($find->update($data)){
            return back()->with('success','Country updated');
        }

    }

    public function delete_country(Request $request)
    {
        $find=Country::findorfail($request->id);
        if ($find->city == null)
        {
            $find->delete();
            return back()->with('success','Country deleted');
        }
        else{
            return back()->with('error','Delete related city first');
        }

    }

    public function add_city(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $country=Country::all();
            $city=City::all();
            return view($this->backendPagePath . 'shipping/city',compact('country','city'));
        }

        if ($request->isMethod('post'))
        {
           $city=new City();
           $city->name=$request->city;
           $city->country_id=$request->country;
           $city->save();
            return back()->with('success','City added');
        }
    }

    public function delete_city(Request $request)
    {
        $id=$request->id;
        $find=City::findorfail($id);
        $find->delete();
        return back()->with('success','City deleted');
    }

    public function edit_city(Request $request)
    {
//        dd($request->all());
        $id=$request->id;
        $data['name']=$request->city;
        $data['country_id']=$request->country;
        $find=City::where('id',$id)->first();
        if ($find->update($data)){
            return back()->with('success','City updated');
        }

    }

    public function deal_status(Request $request)
    {
        $id = $request->deal;

        $deal = Shipping::findorfail($id);

        if (isset($_POST['active'])) {
            $deal->status = 0;
        }
        if (isset($_POST['inactive'])) {
            $deal->status = 1;
        }
        $save = $deal->update();
        if ($save) {
            Session::flash('success', 'Status updated');
            return redirect()->back();
        }
    }

}
