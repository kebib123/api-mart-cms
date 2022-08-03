@extends('backend.layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 style="text-align:center">All Products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="package_table" class="table table-bordered datatable">
                <thead>
                <tr class="table table-primary">
                    <th>ID</th>
                    <th>Title</th>
                    <th>SKU</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Hot Deals</th>
                    <th>On Sale</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>@if($product->is_featured == 'featured')
                                 Featured
                            @else
                               Not Featured
                                @endif
                        </td>
                        <td>
                            @if($product->status==1)
                                <button class="btn btn-success btn btn-sm" name="active"><i
                                        class="fa fa-check"></i>
                                </button>
                            @else
                                <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                        class="fa fa-times"></i>
                                </button>
                                @endif
                        </td>
                        <td>
                            @foreach($product->categories as $value)
{{--                            {{ $product->categories ? $product->categories->first()->name : '-' }}--}}
                                <li>{{$value->name}}</li>
                                @endforeach
                        </td>

                        <td>{{$product->brands ? $product->brands->brand_name : '-'}}</td>


                        <td>
                            <img src="{{asset('/images/products/'.$img->get_main_image($product->id))}}" width="100px" alt="product">
                        </td>
                        <td>@if($product->size_variation == 0)
                                @foreach($product->colorstocks as $stock)
                                    <li>
                                        {{ $stock->title }}&nbsp;:&nbsp;{{ $stock->pivot->stock }}

                                    </li>
                                @endforeach
                            @else
                                @if($product->size_variation == 1)
                                    <ul>
                                        @foreach($product->stocks as $stock)
                                            <li>
                                                {{ $stock->size->title }}&nbsp;:&nbsp;{{ $stock->stock }}
                                            </li>
                                        @endforeach
                                    </ul>
                               @endif
                            @endif
                        </td>
                        <td>
                            @if($product->is_special==1)
                                <button class="btn btn-success btn btn-sm" name="active"><i
                                        class="fa fa-check"></i>
                                </button>
                            @else
                                <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                        class="fa fa-times"></i>
                                </button>
                            @endif
                        </td>
                        <td>
                            @if($product->on_sale==1)
                                <button class="btn btn-success btn btn-sm" name="active"><i
                                        class="fa fa-check"></i>
                                </button>
                            @else
                                <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                        class="fa fa-times"></i>
                                </button>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary confirm"
                               href="{{route('edit-product',$product->id)}}"><i class="fa fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary confirm"
                               href="{{route('show-product',$product->slug)}}"
                            ><i class="fa fa fa-eye"></i></a>
                            <a class="btn btn-sm btn-outline-primary confirm"
                               href="{{route('delete-product',$product->id)}}"
                               onclick="return confirm('Confirm Delete?')"
                            ><i class="fa fa fa-trash"></i></a>
                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>

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
