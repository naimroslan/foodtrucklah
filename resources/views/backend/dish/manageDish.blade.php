@extends('backend.master')
@section('title')
    Manage Rider
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
            <h3 class="card-title">Dish Detail</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Detail</th>
                    <th>Image</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $dish->dish_name }}
                        </td>
                        <td>
                            {{ $dish->category_name }}
                        </td>
                        <td>
                            {{ $dish->dish_detail }}
                        </td>
                        <td>
                            <img src="{{ asset($dish->dish_image) }}" height="25" width="60" class="img-fluid img-thumbnail">
                        </td>
                        <td>
                            {{ $dish->created_at }}
                        </td>
                        <td>

                            @if($dish->dish_status == 1)
                                <a class="btn btn-outline-success" href="{{ route('dish_inactive', ['dish_id'=>$dish->dish_id]) }}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{ route('dish_active', ['dish_id'=>$dish->dish_id]) }}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{ $dish->dish_id }}">
                                <i class="fas fa-edit" title="Click to Edit"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{ route('dish_delete', ['dish_id'=>$dish->dish_id]) }}">
                                <i class="fas fa-trash" title="Click to Delete"></i>
                            </a>

                        </td>
                    </tr>

                    {{-- ========================================= modal ===============================================================--}}
                    <div class="modal fade" id="edit{{ $dish->dish_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Rider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dish_update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="dish_name" value="{{ $dish->dish_name }}">
                                            <input type="hidden" class="form-control" name="dish_id" value="{{ $dish->dish_id }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Previous Category</label>
                                            <input type="text" class="form-control" value="{{ $dish->category_name }}">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                                <option>----Select Category----</option>
                                                @foreach($categories as $cate)
                                                    <option value="{{ $cate->category_id }}"> {{ $cate->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea type="text" name="dish_detail" class="form-control" rows="5">{{ $dish->dish_detail }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Previous Image</label>
                                            <img src="{{ asset($dish->dish_image) }}" style="height: 150px; width: 150px; border-radius: 50%">
                                            <input type="file" class="form-control" name="dish_image" accept="image/*">
                                        </div>

                                        <div class="card">
                                            <div class="card-header" title="">Dish Attribute</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Full Price</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="full_price" value="{{ $dish->full_price }}" >
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <label>Half Price</label>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <input type="text" class="form-control" name="half_price" value="{{ $dish->half_price }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="btn" class="btn btn-outline-primary btn-block" value="Update">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
