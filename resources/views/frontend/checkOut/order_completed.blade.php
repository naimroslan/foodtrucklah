@extends('frontend.master')
@section('title')
    Order Completed
@endsection
@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">

                    @if(Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            <p> {{ Session::get('success') }} </p>
                        </div>
                    @endif

                    <div class="card-body">
                        <h2 class="text-capitalize">Thanks for your order!</h2>
                        <p>We will be contacting you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
