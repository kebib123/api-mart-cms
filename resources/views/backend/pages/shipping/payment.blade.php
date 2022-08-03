@extends('backend.layouts.master')
@section('content')

    <section class="content">

        <div class="card col-md-6 offset-md-3" style="background-color: #f4f6f9">
            <div class="card-body">
                <h1 class=" text-dark" style="text-align: center">Add Payment Method</h1>
                <hr>
            </div>
            <form action="{{  route('payment.method') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Add Payment Method</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <hr>
                <div class="form-group">
                    <label for="title">Payment Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                {{--                <div class="form-group">--}}
                {{--                    <label for="title">Zip Code</label>--}}
                {{--                    <input type="text" name="zip_code" class="form-control" required>--}}
                {{--                </div>--}}
                <div class="form-group">
                    <label for="title">Status</label>
                    <select class="form-control" name="status">
                        <option selected disabled>Select Status</option>
                        <option value="1">Enabled</option>
                        <option value="0" >Disabled</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus">Add</i></button>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header with-border">
                <h3 class="box-title">All Payment Method</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Payment Method</th>
                        <th>Payment Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($payment as $key=>$shipping)
                        <tr>
                            <td> {{ $key+=1 }} </td>
                            <td> {{  $shipping->name }} </td>
                            <td><img src="{{asset('images/payments/'.$shipping->image)}}" width="50px"></td>
                            <td>
                                <form method="post" action="{{route('payment-status')}}">
                                    <input type="hidden" name="deal" value="{{$shipping->id}}">
                                    @csrf
                                    @if(($shipping->status)==0)
                                        <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                                class="fa fa-times"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-success btn btn-sm" name="active"><i
                                                class="fa fa-check"></i>
                                        </button>
                                    @endif
                                    <small>Click to change status</small>
                                </form>
                            <td>
                                <a class="btn btn-danger confirm"
                                   href="{{route('delete.payment',$shipping->id)}}"
                                   onclick="return confirm('Confirm Delete?')"><i
                                        class="fa fa fa-trash"></i>Delete </a>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </section>

@stop



