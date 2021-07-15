@extends('backend.master')
@section('title')
    Order
@endsection
@section('content')

    <div class="offset-2 col-md-8">
        <div class="card my-5">
            <div class="card-header">
                <h1 class="text-center text-muted">Customer Order Info</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $customer->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $customer->phone_no }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">
            <div class="card-header">
                <h1 class="text-center text-muted">Order Info</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Order No</th>
                        <td>{{ $order->order_id }}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{ $order->order_total }}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{ $order->order_status }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">
            <div class="card-header">
                <h1 class="text-center text-muted">Shipping Order Info</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $shipping->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $shipping->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $shipping->phone_no }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $shipping->address }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">
            <div class="card-header">
                <h1 class="text-center text-muted">Payment Info</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Payment Type</th>
                        <td>{{ $payment->payment_type }}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{ $payment->payment_status }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">
            <div class="card-header">
                <h1 class="text-center text-muted">Dish Info</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($order_details as $orderD)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                {{ $orderD->dish_id }}
                            </td>
                            <td>
                                {{ $orderD->dish_name }}
                            </td>
                            <td>
                                {{ $orderD->dish_price }}
                            </td>
                            <td>
                                {{ $orderD->dish_qty }}
                            </td>
                            <td>
                                {{ $orderD->dish_price * $orderD->dish_qty }}
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
