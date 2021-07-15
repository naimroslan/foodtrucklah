<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\payment;
use App\Shipping;
use App\Customer;
use Illuminate\Http\Request;
use DB;
use PDF;

class OrderController extends Controller
{
    public function manage() {

        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.username','payments.payment_type','payments.payment_status')
            ->get();

        return view('backend.order.manage', compact('orders'));
    }

    public function view($order_id) {

        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $payment = payment::where('order_id', $order->order_id)->first();
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('backend.order.view_order', compact('order','customer','shipping','payment','order_details'));
    }

    public function viewOrderInvoice($order_id) {

        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $payment = payment::where('order_id', $order->order_id)->first();
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('backend.order.view_order_invoice', compact('order','customer','shipping','payment','order_details'));
    }

    public function downloadInvoice($order_id) {

        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $payment = payment::where('order_id', $order->order_id)->first();
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        $pdf = PDF::loadView('backend.order.download_invoice', compact('order','customer','shipping','payment','order_details'));

        return $pdf->stream('OrderInvoice.pdf');
    }

    public function delete($order_id) {

        $order = Order::find($order_id);
        $order->delete();

        return back()/*->with('sms', 'Order deleted successfully!')*/;
    }
}
