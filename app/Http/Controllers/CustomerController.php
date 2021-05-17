<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use Mail;
use Session;

class CustomerController extends Controller
{
    public function show() {
        return view('frontend.customer.register');
    }

    public function store(Request $request) {
        $customer = new Customer();

        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->phone_no = $request->phone_no;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $customer_id = $customer->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer->username);

        /*$data = $customer->toArray();

        Mail::send('frontend.mail.welcome_mail', $data, function ($message) use($data) {
            $message->to($data['email']);
            $message->subject('Welcome to Foodtrucklah!');
        }); */

        return redirect('/shipping');
    }

    public function shipping() {
        $customer = Customer::find(Session::get('customer_id'));
        return view('frontend.checkOut.shipping', compact('customer'));
    }

    public function save(Request $request) {
        $shipping = new Shipping();

        $shipping->username = $request->username;
        $shipping->email = $request->email;
        $shipping->phone_no = $request->phone_no;
        $shipping->address = $request->address;
        $shipping->save();

        dd('success');
    }
}
