<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends BackendController
{
    public function all_orders(Request $request)
    {
        if ($request->isMethod('get')) {
            $order = Order::orderBy('created_at', 'desc')->get();
            return view($this->backendPagePath . 'order/all_orders', compact('order'));
        }

    }

    public function order_details(Request $request)
    {
        if ($request->isMethod('get')) {
            $order = Order::where('id', $request->id)->first();
            $detail = OrderDetail::where('order_id', $request->id)->get();
//          dd($detail->products);
            $img = new Product();

            return view($this->backendPagePath . 'order/order_details', compact('order', 'detail', 'img'));

        }
    }

    public function order_status(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $data['status'] = $request->orders_status;
            $status = Order::findorfail($id);
            if ($status->update($data)) {
                Session::flash('success', 'Status updated');
                return redirect()->back();
            }
        }
    }

    public function generatePDF(Request $request)
    {

        if ($request->isMethod('get')) {
            $order = Order::where('id', $request->id)->first();
            $detail = OrderDetail::where('order_id', $request->id)->get();
            $pdf = Facade::loadView('backend.pages.order.invoice', array('detail' => $detail, 'order' => $order));
            $pdf->save(storage_path() . '_invoice.pdf');
            return $pdf->download('invoice.pdf');

        }

    }

    public function order_delete(Request $request)
    {
        $find = Order::where('id', $request->id)->first();
        $details = $find->details();
        $details->delete();
        $find->delete();
        return back()->with('success', 'Order deleted successfully');
    }
}
