@extends('backend.layouts.master')
@section('content')
    <div class="container">
        <h3 class="blockquote" style="text-align: center">View Banners / <a href="banner/create" class="btn btn-primary btn-sm">Create</a></h3>
        <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
            <thead>
            <tr>
                <th>S.N</th>
                <th>Title</th>                
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->title}} </td>
                   
                    <td>
                        <a class="btn btn-primary" href="{{url('admin/banner/'.$value->id.'/edit')}}"><i class="fa fa-eye"></i> </a>

                        <a class="btn btn-danger confirm" href="{{url('admin/banner/'.$value->id.'/destroy')}}"  onclick="return confirm('Confirm Delete?')">
                            <i class="fa fa fa-trash" ></i>
                        
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $('.datatable').DataTable({

        });
    </script>
@endpush
