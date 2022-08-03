@extends('backend.layouts.master')
@section('content')
    <div class="container">
        <form method="post" class="form-group" action="{{route('add-color')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Color</h3>
                                </div>
                                <hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Color</label>
                                        <input class="form-control" placeholder="Enter color" name="color" type="text">

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input class="btn btn-danger btn-xs pull-right" type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.box -->
        </form>



        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-header">
                        <h3 class="box-title">All Colors</h3>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>

                                <th class="sorting-false">Action</th>
                            </tr>
                            </thead>
                            @foreach($colors as $key=>$value)
                                <tbody>
                                <td>{{$key+=1}}</td>
                                <td>{{$value->title}}</td>
                                <td>
                                    <a class="btn btn-danger confirm"
                                       href="{{route('delete-color',$value->id)}}"
                                       onclick="return confirm('Confirm Delete?')"><i
                                            class="fa fa fa-trash"></i>Delete </a>
                                </td>
                                </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>

                                <th class="sorting-false">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>

@endsection
