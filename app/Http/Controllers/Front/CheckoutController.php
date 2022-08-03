<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Model\Country;
use App\Model\Order;
use App\Model\OrderAddress;
use App\Model\OrderDetail;
use App\Model\PaymentMethod;
use App\Model\Shipping;
use App\Model\Size;
use App\Model\Stock;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout_address(Request $request)
    {
        if ($request->isMethod('get')) {
            $cartItem = Cart::content();
            $countries = Country::all();
            $shipping = Shipping::where('status', 1)->get();
            $sub = Cart::subtotal();
            $total = preg_replace("/[^0-9.]/", "", $sub);
            $final = (int)$total;
            return view('frontend/pages/checkout/checkout-details', compact('cartItem', 'countries', 'shipping', 'final'));
        }
        if ($request->isMethod('post')) {
//            dd((new \Gloudemans\Shoppingcart\Cart)->instance(Auth::user()->id));
//            dd(Cart::content());
//            dd($request->all());
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zip_code' => 'required',
                'address_1' => 'required',
                'address_2' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()->all()
                ], 406);
            }
            $data['subtotal'] = $request->subtotal;
            $data['tax'] = $request->tax;
            $data['grand_total'] = $request->subtotal + $request->tax + $request->shipping;
//            $data['discount'] = 0;
            $data['user_id'] = $request->user_id;
            $data['shipping_id'] = $request->shipping_id;
            $data['order_track'] = 'OT' . $request->user_id . '-' . time();
            $data['status']=0;
            $order = Order::create($data);

            $order_id = $order->id;

            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['country'] = $request->country;
            $data['city'] = $request->city;
            $data['zip_code'] = $request->zip_code;
            $data['address1'] = $request->address_1;
            $data['address2'] = $request->address_2;
            $data['order_id'] = $order_id;
            $save = OrderAddress::create($data);
            $address_id = $save->id;
            foreach (Cart::content() as $product) {
//                dd($product->id);
                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $product->id;
                $detail->price = $product->price;
                $detail->quantity = $product->qty;
                $detail->size = $product->options['size'];
                $detail->color = $product->options['color'];
                $detail->discount = 0;
                $detail->total = $product->price * $product->qty;
                $detail->save();
            }

//            foreach ($order->order_details as $orderDetail) {
////                dd($product->colorstocks->first()->pivot->stock);
//                if ($orderDetail->products->size_variation == 0) {
//                    $decreasedQuantity =$orderDetail->products->colorstocks->first()->pivot->stock - $orderDetail->quantity;
//                    $update = DB::table('color_stocks')
//                        ->where('product_id', $orderDetail->product_id)
//                        ->where('color_id', $orderDetail->products->colorstocks->first()->id)
//                        ->update(['stock' => $decreasedQuantity]);
////                    $idss=array($product->colorstocks->first()->id);
//////                    $decreasedQuantity = $product->colorstocks->first()->pivot->stock - $orderDetail->quantity;
////
////
////                    $product->colorstocks()->sync([0=>2], ['stock' =>300]);
//                } else {
//                    $size = Size::where('title', $orderDetail->size)->first();
//                    $stock = Stock::where('product_id', $product->id)->where('size_id', $size->id)->first();
//                    $stock->stock = $stock->stock - 1;
//                    $stock->save();
//                }
//            }
            //sending email
//        $user = Auth::user();
//        $data = ['email' => $user->email, 'order' => $order];
//        return new OrderMail($data);
//        Mail::to($user->email)->send(new OrderMail($data));

            if ($order && $save) {
                Cart::destroy();
                return response()->json(['status'=>'success','message'=>'Order placed successfully','order_id' => $order_id, 'route' => route('checkout-payment', ['order_id' => $order_id])], 200);

            }

        }

    }



    public function shipping_page()
    {
        return view('frontend/pages/checkout/checkout-shipping');
    }

    public function checkout_payment(Request $request)
    {
        if ($request->isMethod('get')) {
            $order = Order::where('id', $request->order_id)->first();
            $cartItem = Cart::content();
            $payment=PaymentMethod::where('status',1)->get();
            return view('frontend/pages/checkout/checkout-payment', compact('order', 'cartItem','payment'));
        }

    }

    public function checkout_review(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        $cartItem = Cart::content();
        return view('frontend/pages/checkout/checkout-review', compact('cartItem', 'order'));
    }

    public function checkout_complete(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        return view('frontend/pages/checkout/checkout-complete',compact('order'));
    }

    public function track_form()
    {
        return view('frontend/pages/checkout/order-tracking-form');
    }

    public function track_order(Request  $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        $details=$order->details;
        return view('frontend/pages/checkout/order-tracking',compact('details','order'));

    }
}
