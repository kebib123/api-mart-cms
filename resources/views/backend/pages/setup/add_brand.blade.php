@extends('backend.layouts.master')
@section('content')

<div class="container">
    <form method="post" class="form-group" action="{{route('add-brand')}}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="formGroupExampleInput">Brand </label>
                            <input type="text" name="brand_name" class="form-control" id="formGroupExampleInput"
                                   placeholder="enter brand name">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Logo:</label>
                            <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus-circle"></i> Add Brand
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brand as $value)
                    <tr>
                        <td><img src="{{url('images/brands/'.$value->brand_image)}}" width="150px"></td>
                        <td>{{$value->brand_name}}</td>

                        <td>
                            <a class="btn btn-danger confirm"
                               href="{{route('delete-brand',$value->id)}}"
                               onclick="return confirm('Confirm Delete?')"><i
                                    class="fa fa fa-trash"></i>Delete </a>
                            <a class="btn btn-outline-primary confirm"
                               data-toggle="modal"
                               data-target="#myEditModal{{ $value->id }}"
                            ><i class="fa fa fa-edit"></i>Edit </a>
                        </td>
                        <div id="myEditModal{{ $value->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-xs">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" align="center"><b>Edit Brand</b></h4>

                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="card-body">

                                        <form method="post" class="form-group" action="{{route('edit-brand')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- general form elements -->
                                                            <div class="box">
                                                                <!-- form start -->
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label for="name" class="control-label">Brand</label>
                                                                        <input class="form-control" placeholder="Name" name="brand_name" type="text"
                                                                               value="{{$value->brand_name}}">

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Current Picture:</label>
                                                                        <br>
                                                                        <img src="{{url('images/brands/'.$value->brand_image)}}" width="100">
                                                                        <hr>
                                                                        <label for="formGroupExampleInput">Logo:</label>
                                                                        <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                                                                    </div>

                                                                </div>
                                                                <!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <input class="btn btn-danger btn-xs pull-right" type="submit" value="Update">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- /.box -->
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>

                </tbody>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@stop
