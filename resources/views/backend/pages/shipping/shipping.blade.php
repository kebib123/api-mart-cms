@extends('backend.layouts.master')
@section('content')

    <section class="content">

        <div class="card col-md-6 offset-md-3" style="background-color: #f4f6f9">
            <div class="card-body">
                <h1 class=" text-dark" style="text-align: center">Add Shipping Location</h1>
                <hr>
            </div>
            <form action="{{  route('post_location') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Add Shipping Location</label>
                    <select class="form-control" name="city">
                        <option selected disabled> Please select City</option>
                        @foreach($city as $value)
                            <option value="{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label for="title">Shipping Rate</label>
                    <input type="number" name="shipping_rate" class="form-control" required>
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
                <h3 class="box-title">All Shipping Locations</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Shipping Location</th>
                        <th>Shipping Rate</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($shippings as $key=>$shipping)
                        <tr>
                            <td> {{ $key+=1 }} </td>
                            <td> {{  $shipping->shipping_location }} </td>
                            <td>{{  $shipping->shipping_price }}</td>
                            <td>
                                <form method="post" action="{{route('shipping-status')}}">
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
                                   href="{{route('delete-location',$shipping->id)}}"
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



