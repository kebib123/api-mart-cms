@extends('backend.layouts.master')
@section('content')
    <div class="container">
        <h3 class="blockquote" style="text-align: center">View Orders</h3>
        <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
            <thead>
            <tr>
                <th>S.N</th>
                <th>Order Tracking ID</th>
                <th>Customer</th>
                <th>Order Status</th>
                <th>Payment Method</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->order_track}} </td>
                    <td>{{$value->users->first_name}} {{$value->users->last_name}} </td>
                    <td>@if($value->status==0)
                            <span class="badge badge-danger">Pending</span>
                        @endif
                        @if(($value->status==1))
                            <span class="badge badge-success">Completed</span>
                        @endif
                        @if(($value->status==2))
                            <span class="badge badge-secondary">Cancel</span>
                        @endif
                        @if(($value->status==3))
                            <span class="badge badge-primary">Return</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-secondary">Cash on Delivery</span>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('order-details',$value->id)}}"><i class="fa fa-eye"></i> </a>

                        <a class="btn btn-danger confirm"
                           href="{{route('order-delete',$value->id)}}"
                           onclick="return confirm('Confirm Delete?')"><i
                                class="fa fa fa-trash"></i></a>
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
