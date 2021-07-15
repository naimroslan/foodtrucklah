@extends('frontend.master')

@section('title')
    Shipping
@endsection
@section('content')

    <!-- Shipping page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{ asset('/') }}frontendSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Shipping Address</h3>
            <p class="w3ls-title w3ls-title1 text-center">You can change your shipping information</p>
            <div class="login-agileinfo">
                <form action="{{ route('store_shipping') }}" method="post">
                    @csrf
                    <label>Full name:</label>
                    <input class="agile-ltext" type="text" name="username" placeholder="Full Name" value="{{ $customer->username }}">

                    <label>Email:</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Email" value="{{ $customer->email }}">

                    <label>Phone Number:</label>
                    <input class="agile-ltext" type="text" name="phone_no" placeholder="Phone Number" value="{{ $customer->phone_no }}">

                    <label>Address:</label>
                    <input class="agile-ltext" type="text" name="address" placeholder="Address" required="">
                    <div class="wthreelogin-text">
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Proceed">
                </form>
            </div>
        </div>
    </div>
    <!-- Shipping page -->

@endsection
