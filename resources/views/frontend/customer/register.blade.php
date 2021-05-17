@extends('frontend.master')
@section('title')
    Customer Registration
@endsection
@section('content')
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{ asset('/') }}frontendSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>
            <div class="login-agileinfo">
                <form action="{{ route('store_customer') }}" method="post">
                    @csrf
                    <input class="agile-ltext" type="text" name="username" placeholder="Full Name" required="">
                    <input class="agile-ltext" type="email" name="email" placeholder="Email" required="">
                    <input class="agile-ltext" type="text" name="phone_no" placeholder="Phone Number" required="">
                    <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
                    <div class="wthreelogin-text">
                        <ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                    <span> I agree to the terms of service</span>
                                </label>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </div>
    <!-- //sign up-page -->
@endsection
