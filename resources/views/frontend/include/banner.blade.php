<div class="banner">
    <!-- header -->
    <div class="header">
        {{--<div class="w3ls-header"><!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>Free home delivery at your doorstep For Above $30</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>

                        @if(Session::get('customer_id'))
                            <li class="head-dpdn">
                                <a href="#" onclick="document.getElementById('customerLogout').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                                <form action="{{ route('log_out') }}" id="customerLogout" method="post">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="{{ route('log_in') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                            </li>
                        @endif

                        @if(Session::get('customer_id'))
                            <li class="head-dpdn">
                                <a href="{{ route('sign_up') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                    {{ Session::get('customer_username') }}</a>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="{{ route('sign_up') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>--}}
        <!-- //header-one -->
        <!-- navigation -->
        <div class="navigation agiletop-nav">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header w3l_logo">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a href="{{ url('/') }}">Foodtrucklah<span>A Hub for Street Food</span></a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @foreach($categories as $cate)
                            <li><a href="{{ route('category_dish', ['category_id'=>$cate->category_id]) }}">{{ $cate->category_name }}</a></li>
                            @endforeach

                            @if(Session::get('customer_id'))
                                <li class="head-dpdn">
                                    <a href="#" onclick="document.getElementById('customerLogout').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                                    <form action="{{ route('log_out') }}" id="customerLogout" method="post">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="head-dpdn">
                                    <a href="{{ route('log_in') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                                </li>
                            @endif

                            @if(Session::get('customer_id'))
                                <li class="head-dpdn">
                                    <a href="{{--{{ route('sign_up') }}--}}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        {{ Session::get('customer_username') }}</a>
                                </li>
                            @else
                                <li class="head-dpdn">
                                    <a href="{{ route('sign_up') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="cart cart box_1">
                        <a href="{{ route('cart_show') }}" class="last">
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
    </div>
    <!-- //header-end -->
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <h2>Delicious street food from the <br> <span>Best Chefs For you.</span></h2>
            {{--<div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="text" placeholder="Enter Your Area Name" required="">
                    <select id="agileinfo_search" name="agileinfo_search" required="">
                        <option value="">Popular Cities</option>
                        <option value="navs">New York</option>
                        <option value="quotes">Los Angeles</option>
                        <option value="videos">Chicago</option>
                        <option value="news">Phoenix</option>
                        <option value="notices">Fort Worth</option>
                        <option value="all">Other</option>
                    </select>
                    <input type="submit" value="Search">
                </form>
            </div>--}}
        </div>
    </div>
</div>
