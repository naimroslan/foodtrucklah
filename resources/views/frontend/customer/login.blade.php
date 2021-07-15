@extends('frontend.master')
@section('title')
    Customer Login
@endsection
@section('content')

    <!-- sign in page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{ asset('/') }}frontendSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Log In</h3>
            <strong class="text-center" style="color:#ff0000">{{ Session::get('sms') }}</strong>
            <div class="login-agileinfo">
                <form action="{{ route('check_login') }}" method="post">
                    @csrf
                    <input class="agile-ltext" type="email" name="email" placeholder="Email" required="">

                    <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">

                    <input type="submit" value="Log In">

                    Administrator login <a href="{{ route('login') }}">here</a>
                </form>
            </div>
        </div>
    </div>
    <!-- sign in page -->

@endsection
