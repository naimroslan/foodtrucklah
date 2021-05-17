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
            <h3 class="card-title">Rider Detail</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($riders as $rider)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $rider->rider_name }}
                        </td>
                        <td>
                            {{ $rider->rider_phone_number }}
                        </td>
                        <td>
                            {{ $rider->added_on }}
                        </td>
                        <td>

                           @if($rider->rider_status == 1)
                                <a class="btn btn-outline-success" href="{{ route('rider_inactive', ['rider_id'=>$rider->rider_id]) }}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                           @else
                                <a class="btn btn-outline-info" href="{{ route('rider_active', ['rider_id'=>$rider->rider_id]) }}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                           @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{ $rider->rider_id }}">
                                <i class="fas fa-edit" title="Click to Edit"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{ route('rider_delete', ['rider_id'=>$rider->rider_id]) }}">
                                <i class="fas fa-trash" title="Click to Delete"></i>
                            </a>

                        </td>
                    </tr>

                    {{-- ========================================= modal ===============================================================--}}
                    <div class="modal fade" id="edit{{ $rider->rider_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Rider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('rider_update') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" name="rider_name" value="{{ $rider->rider_name }}">
                                            <input type="hidden" class="form-control" name="rider_id" value="{{ $rider->rider_id }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" class="form-control" name="rider_phone_number" value="{{ $rider->rider_phone_number }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="btn" class="btn btn-primary" value="Update">
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
