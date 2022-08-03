@extends('backend.layouts.master')
@section('content')

    <div class="container">
        <form method="post" class="form-group" action="{{route('faq')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Faq's</h3>
                                </div>
                                <hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Title</label>
                                        <input class="form-control" placeholder="title" name="title" type="text">

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Description</label>
                                        <textarea name="description" class="form-control" id="faq"></textarea>
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
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="box-header">
                                <h3 class="box-title">All Users</h3>
                            </div>
                            <div class="box-body">
                                <table id="example" class="table table-bordered table-striped datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>

                                    </tr>
                                    </thead>
                                    @foreach($faq as $key=>$value)
                                        <tbody>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->description}}</td>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
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
        </form>

    </div>




@stop

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $('.datatable').DataTable({

        });
    </script>
@endpush
