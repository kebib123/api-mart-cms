<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends FrontController
{
    /**
     * success response method.
     *
//     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return  view('frontend.stripe');
    }


    /**
     * success response method.
     *
//     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        dd('ok');
        dd($request->stripeToken);
        Stripe::setApiKey("sk_test_51HskxwBFVVslpi76mCy7fEhn82Zs4d8nPPLtSGXKozXWTdPNppRhajQE4sNPz2jAQbJWeBCAp7apmCzXuJxnQIXO00uiCzF8HG");
        Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function verification(Request $request)
    {
//        dd($request->all());
        $args = http_build_query(array(
            'token' => $request->token,
            'amount' => $request->amount
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_b7e1a6a0077a4bc092345af3ad88cc84'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status_code == '200') {
            return response()->json(['message' => 'Payment done successfully'],200);
        }
        return true;
    }

}
