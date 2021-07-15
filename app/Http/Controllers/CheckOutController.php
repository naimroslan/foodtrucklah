<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\payment;
use Session;
use Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function payment() {

        return view('frontend.checkout.checkout_payment');
    }

    public function order(Request $request) {

        $paymentType = $request->payment_type;

        if($paymentType == 'Cash') {

            $order = new Order();

            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('sum');
            $order->save();

            $payment = new payment();

            $payment->order_id = $order->order_id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $CartDish = Cart::content();

            foreach ($CartDish as $cart) {

                $orderDetail = new OrderDetail();

                $orderDetail->order_id = $order->order_id;
                $orderDetail->dish_id = $cart->id;
                $orderDetail->dish_name = $cart->name;

                if($cart->half_price == null) {

                    $orderDetail->dish_price = $cart->price;
                }
                elseif($cart->half_price !== null) {

                    $orderDetail->dish_price = $cart->price;
                    $orderDetail->dish_price = $cart->half_price;
                }

                $orderDetail->dish_qty = $cart->qty;
                $orderDetail->save();
            }

            Cart::destroy();
            Session::flash('success', 'Your Order is being processed!');

            return redirect('checkout/order/complete');

        } elseif ($paymentType == 'Stripe') {

            $order = new Order();

            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('sum');
            $order->save();

            $payment = new payment();

            $payment->order_id = $order->order_id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $CartDish = Cart::content();

            foreach ($CartDish as $cart) {

                $orderDetail = new OrderDetail();

                $orderDetail->order_id = $order->order_id;
                $orderDetail->dish_id = $cart->id;
                $orderDetail->dish_name = $cart->name;

                if($cart->half_price == null) {

                    $orderDetail->dish_price = $cart->price;
                }
                elseif($cart->half_price !== null) {

                    $orderDetail->dish_price = $cart->price;
                    $orderDetail->dish_price = $cart->half_price;
                }

                $orderDetail->dish_qty = $cart->qty;
                $orderDetail->save();
            }

            Cart::destroy();

            return redirect('/stripe-payment');
        }
    }

    public function complete() {

        return view('frontend.checkout.order_completed');
    }
}
