<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentMethod;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends BackendController
{
    public function payment_method(Request $request)
    {
        if ($request->isMethod('get')) {
            $payment = PaymentMethod::all();
            return view($this->backendPagePath . 'shipping/payment', compact('payment'));
        }
        if ($request->isMethod('post')) {
            $shipping = new PaymentMethod();
            $shipping->name = $request->name;
            $shipping->status = $request->status;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/payments/');

                $image->move($destinationPath, $name);
                $shipping['image'] = $name;
            }

            $shipping->save();
            return back()->with('success', 'Payment Method added');
        }
    }

    public function deal_status(Request $request)
    {
        $id = $request->deal;

        $deal = PaymentMethod::findorfail($id);

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

    public function delete_file($id)
    {
        $findData = PaymentMethod::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/payments/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function delete_method(Request $request)
    {
        $find = PaymentMethod::findorfail($request->id);
        $this->delete_file($request->id);
        $find->delete();
        return redirect()->back()->with('success','Payment Method Deleted!');
    }
}
