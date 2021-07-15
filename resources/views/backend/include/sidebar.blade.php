@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/home') }}" class="brand-link">
        <img src="{{ asset('/backendSourceFile') }}/dist/img/foodtruck.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: 'Poppins-semibold'; font-size: 16px">FOOD TRUCK LAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/backendSourceFile') }}/dist/img/user8.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- Category -->
                <li class="nav-item has-treeview {{ ($prefix=='/category')?'':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_cate_table') }}" class="nav-link {{ ($route=='show_cate_table')?'':'' }} ">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_cate') }}" class="nav-link {{ ($route=='manage_cate')?'':'' }}">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Rider -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            Rider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_rider_table') }}" class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Rider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rider_manage') }}" class="nav-link">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Rider</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Dish -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Dish
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_dish_table') }}" class="nav-link ">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dish_manage') }}" class="nav-link">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Dish</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Order -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_order') }}" class="nav-link">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Order</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
