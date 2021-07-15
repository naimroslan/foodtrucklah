<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    public function handleGet() {
        return view('frontend.checkout.stripe');
    }

    public function handlePost(Request $request) {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $request->grandTotal*100,
            "currency" => "myr",
            "source" => $request->stripeToken,
            "description" => $request->name,
        ]);

        Session::flash('success', 'Payment has been successfully processed!');

        return redirect('/checkout/order/complete');
    }
}
