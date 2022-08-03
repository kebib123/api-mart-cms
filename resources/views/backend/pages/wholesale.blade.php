@extends('backend.layouts.master')
@section('content')

    <div class="container">
        <form method="post" class="form-group" action="{{route('wholesale-user')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Create Wholesale User</h3>
                                </div>
                                <hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">First Name</label>
                                        <input class="form-control" placeholder="First Name" name="first_name" type="text">

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Last Name</label>
                                        <input class="form-control" placeholder="Last Name" name="last_name" type="text">

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Phone</label>
                                        <input class="form-control" placeholder="Phone" name="phone" type="text">
                                    </div>


                                    <div class="form-group">
                                        <label for="name" class="control-label">Email</label>
                                        <input class="form-control" placeholder="Email" name="email" type="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password">
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
                <div class="col-md-8">
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Roles</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                    </thead>
                                    @foreach($user as $key=>$value)
                                        <tbody>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$value->first_name}}</td>
                                        <td>{{$value->last_name}}</td>
                                        <td>{{$value->roles}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phone}}</td>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Roles</th>
                                        <th>Email</th>
                                        <th>Phone</th>
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
