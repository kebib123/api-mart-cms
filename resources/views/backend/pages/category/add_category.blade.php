@extends('backend.layouts.master')
@section('content')

    <div class="container">
        <form method="post" class="form-group" action="{{route('add-category')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Category</h3>
                                </div>
<hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Category</label>
                                        <input class="form-control" placeholder="Name" name="name" type="text">

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Parent Category</label>
                                        <select name="parent_id" id="parent" class="form-control select2">
                                            <option value="0">Select Parent Category</option>
                                            @foreach($category as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @include('backend.pages.category.category_dropdown',['category'=>$value])
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Image:</label>
                                        <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                                    </div>

                                    <div class="form-group special-link">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">Special:</label>
                                        <select class="form-control" name="is_special" >
                                            <option selected disabled>Select any option</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                  Choose if this is in home page </span>
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
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Image</th>
                                <th>Special</th>
                                <th class="sorting-false">Action</th>
                            </tr>
                            </thead>
                            @foreach($table as $key=>$value)
                                <tbody>
                                <td>{{$key+=1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{App\Model\Category::where('id','=',$value->parent_id)->first() ? App\Model\Category::where('id','=',$value->parent_id)->first()->name : '-'}}</td>
                               <td><img src="{{asset('images/categories/'.$value->image)}}" width="150px"></td>
                                <td>
                                    @if(($value->is_special)==0)
                                        <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                                class="fa fa-times"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-success btn btn-sm" name="active"><i
                                                class="fa fa-check"></i>
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-danger confirm"
                                       href="{{route('delete-category',$value->id)}}"
                                       onclick="return confirm('Confirm Delete?')"><i
                                            class="fa fa fa-trash"></i>Delete </a>
                                    <a class="btn btn-outline-primary confirm"
                                       data-toggle="modal"
                                       data-target="#myEditModal{{ $value->id }}"
                                    ><i class="fa fa fa-edit"></i>Edit </a>
                                </td>

                                <!-- Button trigger modal -->


                                <div id="myEditModal{{ $value->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-xs">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" align="center"><b>Edit Category</b></h4>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="card-body">

                                                <form method="post" class="form-group" action="{{route('edit-category')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$value->id}}">

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <!-- general form elements -->
                                                                    <div class="box">
                                                                        <!-- form start -->
                                                                        <div class="box-body">
                                                                            <div class="form-group">
                                                                                <label for="name" class="control-label">Category</label>
                                                                                <input class="form-control" placeholder="Name" name="name" type="text"
                                                                                       value="{{$value->name}}">

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="name" class="control-label">Parent Category</label>
                                                                                <select name="parent_id" id="parent" class="form-control select2">
                                                                                    <option value="0">Select Parent Category</option>
                                                                                    @foreach($category as $value1)
                                                                                        <option @if($value->parent_id==$value1->id) selected
                                                                                                @endif value="{{$value1->id}}">{{$value1->name}}</option>
                                                                                        @include('backend.pages.category.category_dropdown',['category'=>$value1])

                                                                                    @endforeach
                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">Current Image:</label>
                                                                                <img src="{{asset('images/categories/'.$value->image)}}" width="100px">
                                                                                <hr>
                                                                                <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="name" class="control-label">Special:</label>
                                                                                <select class="form-control" name="is_special" id="isSpecial">
                                                                                    <option @if($value->is_special==0) selected @endif  value="0">No</option>
                                                                                    <option @if($value->is_special==1) selected @endif value="1">Yes</option>
                                                                                </select>
                                                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                                          Choose if this is in home page </span>
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
                                                    </div>
                                                </form>
                                        </div>

                                    </div>
                                </div>

                                </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="sorting-false">Parent</th>
                                <th>Image</th>
                                <th>Special</th>
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

@stop

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $('.datatable').DataTable({

        });
    </script>
@endpush
