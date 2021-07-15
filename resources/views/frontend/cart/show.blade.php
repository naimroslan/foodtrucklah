@extends('frontend.master')

@section('title')
    Cart Show Item
@endsection

@section('content')

    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">

                <div class="card">
                    <h3 class="card-header text-center mt-3" style="background-color: lightyellow; height: 70px; width: auto;">
                        Cart Items
                    </h3>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Remove</th>
                                <th scope="col" class="text-success">Dish Name</th>
                                <th scope="col">Dish Image</th>
                                <th scope="col">Dish Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Grand Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($sum=0)
                            @foreach( $CartDish as $dish )
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <th scope="row">
                                    <a href="{{ route('remove_item', ['rowId' => $dish->rowId]) }}" type="button" class="btn btn-danger">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </th>
                                <td>{{ $dish->name }}</td>
                                <td><img src="{{ asset($dish->options->image) }}" style="height: 50px; width: 50px; border: 50%;"></td>

                                @if($dish->options->half_price==null)
                                    <td>RM {{ $dish->price }}</td>
                                @else
                                    <td>RM {{ $dish->options->half_price }}</td>
                                @endif

                                <td>
                                    <form action="{{ route('update_cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                        <input type="text" name="qty" value="{{ $dish->qty }}" style="width: 50px; height: 25px;" min="1">
                                        <input type="submit" name="btn" class="btn btn-success" value="Update"
                                               style="width: 57px; height: 25px; padding-top: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;">
                                    </form>
                                </td>

                                @if($dish->options->half_price==null)
                                    <td>RM {{ $subTotal = $dish->price*$dish->qty }}</td>
                                @else
                                    <td>RM {{ $subTotal = $dish->options->half_price*$dish->qty }}</td>
                                @endif

                                <td>{{ $dish->$subTotal }}</td>
                                <input type="hidden" value="{{ $sum = $sum + $subTotal }}">
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center"><b> RM {{ $sum }}</b></td>

                                <?php
                                    Session::put('sum', $sum);
                                ?>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            @if(Session::get('customer_id', 'shipping_id'))

                <div class="col-md-9 product-w3ls-right">

                    <a href="{{ url('/checkout/payment') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @elseif(Session::get('customer_id'))
                <div class="col-md-9 product-w3ls-right">

                    <a href="{{ url('/shipping') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>

            @else
                <div class="col-md-9 product-w3ls-right">

                    <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>

                </div>
            @endif

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="login_or_register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>
                                        Welcome to Foodtrucklah!
                                    </h3>
                                    <div class="text-center" style="
                                                                    margin-top: 25px;
                                                                    height: 160px;
                                                                    width: 160px;
                                                                    border-radius: 50%;
                                                                    background-color: darkblue;
                                                                    color: ghostwhite;
                                                                    padding-top: 65px;
                                                                    font-size: 20px">
                                        A Hub for food
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Are you a new?</h4>
                                    <a href="{{ route('sign_up') }}" class="btn-block btn-primary text-center"
                                       style="
                                                height: 60px;
                                                width: auto;
                                                padding-top: 12px;
                                                margin-top: 25px;
                                                font-size: 25px
                                                ">
                                        <span class="mt-5">Register</span>
                                    </a>
                                    <h3 class="mt-lg-5 text-center">Or</h3>
                                    <h4 class="mt-5">Already have an account?</h4>
                                    <a href="{{ route('log_in') }}" class="btn-block btn-success text-center"
                                       style="
                                                height: 60px;
                                                width: auto;
                                                padding-top: 12px;
                                                margin-top: 10px;
                                                font-size: 25px
                                                ">
                                        <span class="mt-5">Login</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    @endsection
