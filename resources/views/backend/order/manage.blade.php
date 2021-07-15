@extends('backend.master')
@section('title')
    Order
@endsection
@section('content')

    {{--  to display message --}}
    @if(Session::get('sms'))
        <div class="alert alert-warning alert-dismissible fade show" role="start">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card my-5">
        <div class="card-header">
            <h3 class="card-title">Customer Order Detail</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $order->username }}
                        </td>
                        <td>
                            {{ $order->order_total }}
                        </td>
                        <td>
                            {{ $order->order_status }}
                        </td>
                        <td>
                            {{ $order->created_at }}
                        </td>
                        <td>
                            {{ $order->payment_type }}
                        </td>
                        <td>
                            {{ $order->payment_status }}
                        </td>

                        <td>

                            <a class="btn btn-outline-success mt-1" href="{{ route('view_order', ['order_id'=>$order->order_id]) }}">
                                <i class="fas fa-search" title="View Order Detail"></i>
                            </a>
                            <a class="btn btn-outline-info mt-1" href="{{ route('view_order_invoice', ['order_id'=>$order->order_id]) }}">
                                <i class="fas fa-search-plus" title="View Invoice"></i>
                            </a>
                            <a class="btn btn-outline-primary mt-1" href="{{ route('download_order_invoice', ['order_id'=>$order->order_id]) }}">
                                <i class="fas fa-arrow-circle-down" title="Download Invoice"></i>
                            </a>
                            <a class="btn btn-outline-danger mt-1" id="delete" href="{{ route('delete_order', ['order_id'=>$order->order_id]) }}">
                                <i class="fas fa-trash" title="Click to Delete"></i>
                            </a>

                        </td>
                    </tr>

                    {{-- ========================================= modal ===============================================================--}}
{{--                    <div class="modal fade" id="edit{{ $dish->dish_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h5 class="modal-title">Update Rider</h5>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <form action="{{ route('dish_update') }}" method="post" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Name</label>--}}
{{--                                            <input type="text" class="form-control" name="dish_name" value="{{ $dish->dish_name }}">--}}
{{--                                            <input type="hidden" class="form-control" name="dish_id" value="{{ $dish->dish_id }}">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>Previous Category</label>--}}
{{--                                            <input type="text" class="form-control" value="{{ $dish->category_name }}">--}}
{{--                                            <label>Category</label>--}}
{{--                                            <select name="category_id" class="form-control">--}}
{{--                                                <option>----Select Category----</option>--}}
{{--                                                @foreach($categories as $cate)--}}
{{--                                                    <option value="{{ $cate->category_id }}"> {{ $cate->category_name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>Detail</label>--}}
{{--                                            <textarea type="text" name="dish_detail" class="form-control" rows="5">{{ $dish->dish_detail }}</textarea>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label>Previous Image</label>--}}
{{--                                            <img src="{{ asset($dish->dish_image) }}" style="height: 150px; width: 150px; border-radius: 50%">--}}
{{--                                            <input type="file" class="form-control" name="dish_image" accept="image/*">--}}
{{--                                        </div>--}}

{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" title="">Dish Attribute</div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label>Full Price</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <input type="text" class="form-control" name="full_price" value="{{ $dish->full_price }}" >--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6 mt-2">--}}
{{--                                                            <label>Half Price</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6 mt-2">--}}
{{--                                                            <input type="text" class="form-control" name="half_price" value="{{ $dish->half_price }}" >--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <input type="submit" name="btn" class="btn btn-outline-primary btn-block" value="Update">--}}
{{--                                        </div>--}}

{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                --}}
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
