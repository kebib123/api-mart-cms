@extends('backend.layouts.master')
@section('content')

    <h3>Edit Product</h3>
    <hr>
    <div class="container">
        <form method="post" class="form-group" id="add_product" enctype="multipart/form-data">
            {{--            <input type="hidden" name="id" value="{{$product->id}}">--}}
            {{--            @csrf--}}

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <h4>
                                    <span style="color: red;">*</span> <label>Title</label>
                                </h4>
                                <input type="text" name="product_name" class="form-control" id="formGroupExampleInput"
                                       value="{{$product->product_name}}" placeholder="enter product name">
                            </div>

                            <h4>
                                <span style="color: red;"></span> <label>SKU</label>
                            </h4>
                            <div class="form-group">
                                <input type="text" id="sku" class="form-control" name="sku"
                                       value="{{$product->sku}}" placeholder="Enter the SKU">
                            </div>
                            <div class="form-group">
                                <h4>
                                    <span style="color: red;">*</span> <label>Actual Price:</label>
                                </h4>
                                <input type="text" id="price" name="price" class="form-control"
                                       id="formGroupExampleInput" value="{{$product->price}}"
                                       placeholder="enter product price">
                            </div>
                            <div class="form-group">
                                <h4>
                                    <span style="color: red;">*</span> <label>Selling Price:</label>
                                </h4>

                                <input type="text" id="discount" name="selling_price"
                                       class="form-control" id="formGroupExampleInput"
                                       value="{{$product->discount_price}}"
                                       placeholder="enter selling price">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <h4>--}}
{{--                                    <span style="color: red;">*</span> <label>Wholesale Price:</label>--}}
{{--                                </h4>--}}
{{--                                <input type="text" name="wholesale_price" class="form-control"--}}
{{--                                       id="formGroupExampleInput" value="{{$product->wholesale_price}}"--}}
{{--                                       placeholder="enter wholesale price">--}}
{{--                                <small>*for wholesale users*</small>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="formGroupExampleInput">Short Description:</label>
                                <textarea id="title"
                                          name="short_description"
                                          class="form-control">
                                    {{$product->short_description}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Long Description:</label>
                                <textarea id="desc1"
                                          name="long_description"
                                          class="form-control">
                                     {{$product->long_description}}
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h6 class="box-title">Status:</h6>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group mb-none">
                                        <select class="form-control" name="status">
                                            <option @if($product->status==1)selected @endif value="1">Enabled</option>
                                            <option @if($product->status==0) selected @endif value="0">Disabled</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h6 class="box-title">Featured/Unfeatured:</h6>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group mb-none">
                                        <select class="form-control" name="is_featured">
                                            <option @if($product->is_featured=='featured')selected
                                                    @endif value="featured">Featured
                                            </option>
                                            <option @if($product->is_featured=='unfeatured')selected
                                                    @endif value="unfeatured">Unfeatured
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="box-header with-border">
                                    <h6 class="box-title">Popular/Unpopular:</h6>
                                </div>
                                <div class="box-body">
                                    <div class="form-group mb-none">
                                        <select class="form-control" name="is_popular">
                                            <option @if($product->is_popular=='popular')selected @endif value="popular">
                                                Popular
                                            </option>
                                            <option @if($product->is_popular=='notpopular')selected
                                                    @endif value="notpopular">Not Popular
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>


                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h6 class="box-title">Brands</h6>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group mb-none">
                                        <select class="form-control" name="brand">
                                            @foreach($brand as $value)
                                                <option @if($value->id==$product->brand_id) selected
                                                        @endif value="{{$value->id}}">{{$value->brand_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h6 class="box-title">Select Category</h6>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group mb-none">
                                        <select class="form-control" name="category[]" id="category"
                                                multiple="multiple">
                                            @foreach($cat as $value)
                                                <option
                                                    @if(\Illuminate\Support\Facades\DB::table('product_categories')
                                       ->where('product_id',$product->id)
                                       ->where('category_id',$value->id)->get()->isNotEmpty()) selected @endif
                                                value="{{$value->id}}">
                                                    {{$value->name}}</option>
                                                @include('backend.pages.category.category_dropdown',['category'=>$value])
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group special-link">
                                <label for="name" class="col-sm-2 col-md-3 control-label">Special:</label>
                                <select class="form-control" name="is_special" id="isSpecial">
                                    <option @if($product->is_special==0) selected @endif value="0">No</option>
                                    <option @if($product->is_special==1) selected @endif value="1">Yes</option>
                                </select>
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                  Choose if this is in deals/special products. Special products belongs to deals.</span>
                            </div>

                            <div class="form-group special-link">
                                <label for="name" class="col-sm-2 col-md-3 control-label">On sale:</label>
                                <select class="form-control" name="on_sale" id="isSpecial">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                  Choose if this is in sale</span>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Enter Video Url (Youtube)</label>
                                <input type="text" name="video" class="form-control" id="formGroupExampleInput"
                                       placeholder="Paste the Url of the Video" value="{{old('video')}}">
                            </div>

{{--                            <label>Current Audio:</label>--}}
{{--                            <audio controls>--}}
{{--                                <source src="{{asset('audio/'.$product->audio)}}" type="audio/mpeg">--}}
{{--                            </audio>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="formGroup">Audio</label>--}}
{{--                                <input type="file" name="audio" class="form-control" id="formGroup">--}}
{{--                            </div>--}}
                        </div>

                    </div>
                </div>
            </div>
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Media</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-inventory" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Inventory</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-seo" role="tab"
                       aria-controls="nav-profile" aria-selected="false">SEO</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover rowadd" id="tab_logic">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Title
                                        </th>
                                        <th class="text-center">
                                            Description
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product->descriptions as $key=>$value)
                                        <tr id='addr0' data-id="{{$loop->iteration}}">
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                <input type="text" name='title[title][{{$value->id}}]'
                                                       value="{{$value->title}}" placeholder='Title'
                                                       class="form-control"/>
                                            </td>
                                            <td>
                                                <input type="text" name='description[desc][{{$value->id}}]'
                                                       value="{{$value->description}}" placeholder='Description'
                                                       class="form-control"/>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row'
                                                                                        class="pull-right btn btn-default">Delete
                            Row</a>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <h4><span style="color: red;">*</span><label for=""> Enter Images of the
                            Product </label></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-images" id="myTable" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->images as $img)
                                    <tr>
                                        <td style="text-align: left;">
                                            <input type="button" class="tdAdd" value="Add Row"/>
                                        <td>
                                            @if($product->images->isNotempty())
                                                <img src="{{asset('images/products/'.$img->image)}}" width="150px">
                                            @else
                                                <input type="file" name="image[]" disabled/>
                                            @endif
                                        </td>
                                        <td>
                                            <input value="" name="is_main" class="is_main radio1" type="radio"
                                                   data-id="{{$img->id}}"
                                                   @if($img->is_main==1) checked
                                                @endif />Is Main?
                                            @if(count($product->images) > 1)

                                                <button class="remove_image btn btn-danger" id="{{ $img->id }}">
                                                    Remove
                                                </button>
                                            @endif
                                        </td>
                                        {{--                                        <td>--}}
                                        {{--                                            <input type="button" value="Delete" class="dlt-img ibtnDel"/>--}}

                                        {{--                                        @if(count($product->images)!=1)--}}
                                        {{--                                                <input type="button" value="Delete" data-id="{{$img->id}}"--}}
                                        {{--                                                       class="dlt-img ibtnDel"/>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="row">
                        <div class="col-md-12">

                            <h4><span style="color: red;">*</span>Sizes</h4>
                            <hr>
                            <div class="form-group">
                                {{--@if($product->size_variation==0)--}}
                                {{--<input type="radio" name="size_type" value="0"> Free-size--}}
                                {{--@else--}}
                                {{--<input type="radio" class="no_size" name="size_type" value="1"> Size Variations--}}
                                {{--@endif--}}
                            </div>
                            <span class="error_message" id="stock_quantity_error"
                                  style="display:none; color: red"></span>
                            @if($product->size_variation==0)

                                <div class="form-group">
                                    {{--                                <label for="">Stock Quantity</label>--}}
                                    {{--                                <input type="number" name="stock_quantity" class="form-control" value="0" min="0">--}}
                                    {{--                                <hr>--}}
                                    <label for="">Stock Quantity based on Color</label>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-colorstocks" id="color_table"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Color</th>
                                                    <th>Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($product->colorstocks as $stock)
                                                    <tr>
                                                        <td style="text-align: left;">
                                                            <input type="button" class="colorStock" value="Add Row"/>
                                                        <td>
                                                            <select name="free_size_color[]">
                                                                @foreach($color as $value)
                                                                    <option @if($value->title==$stock->title)   selected
                                                                            @endif value="{{$value->id}}">{{$value->title}}</option>
                                                                @endforeach

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" value="{{$stock->pivot->stock}}"
                                                                   name="color_stocks[]"/>
                                                        </td>
                                                        <td>
                                                            <button class="remove_stock btn btn-danger" id="{{ $stock->pivot->id }}">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>


                                </div>
                            @else
                                <div class="form-group different_size_form">
                                    <label for="">Stock Quantity based on Size</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-stocks" id="size_table"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($product->stocks as $stock)
                                                    <tr>
                                                        <td style="text-align: left;">
                                                            <input type="button" class="tdAddStock" value="Add Row"/>
                                                        <td>
                                                            <select name="size[]">
                                                                @foreach($size as $value)
                                                                    <option @if($stock->size_id == $value->id) selected
                                                                            @endif value="{{$value->id}}">{{$value->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="color[]">
                                                                @foreach($color as $value)
                                                                    <option @if($stock->color_id == $value->id) selected
                                                                            @endif value="{{$value->id}}">{{$value->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" value="{{$stock->stock}}"
                                                                   name="size_stocks[]"/>
                                                        </td>
                                                        <td>
                                                            <input type="button" value="Delete" class="Del"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="smart-wizard-form-inner">
                        <div class="form-group">
                            <label>SEO Keyword</label>
                            <textarea name="seo_keyword" id="keyword" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>SEO Description</label>
                            <textarea name="seo_description" id="desc" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-upload"></i> Update Product
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>

                </div>
            </div>
        </form>
        <body onload="loadingAjax('myDiv');">
        <div id="myDiv">
            <img id='loading-image  ' src='{{asset('images/loader.gif')}}'
                 style="visibility: hidden; display:none">
        </div>
        </body>

    </div>

@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#category').select2();
        });
    </script>
    <script>
        $(document).ready(function () {

            var last = $('.rowadd tr:last').attr('data-id')
            var i = last ? parseInt(last) : 1;


            $("#add_row").click(function () {
                i++;

                $('#tab_logic').append('<tr id="addr' + i + '" data-id="' + i +
                    '" ></tr>'
                );
                $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input name='title[title][bigtech-" + i + "]" + i + "' type='text' placeholder='Title' class='form-control input-md'  /> </td><td><input  name='description[desc][bigtech-" + i + "]" + i + "' type='text' placeholder='Description'  class='form-control input-md'></td>");

            });
            $("#delete_row").click(function () {
                console.log(i);
                if (i > 1) {
                    $("#addr" + (i - 1)).html('');
                    i--;
                }
            });

        });
    </script>

    <script>
        // multiple stock-colors free size
        jQuery(document).on('click', '.btn-delete-stocks', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });

        $(document).on("click", '.colorStock', function () {
            var counter = $('#color_table tbody tr').length + 1;
            var newRow = $("<tr>");
            var column = "";
            column += '<td><input type="button" value="Add Row" class="colorStock"/></td>';
            column += '<td><select name="free_size_color[]" required>' + counter + ' + ' +
                '@foreach($color as $value)' +
                '<option value="{{ $value->id}}">{{ $value->title}}</option>' +
                '@endforeach' + '</select></td>';
            column += '<td><input type="number" name="color_stocks[]"  ' + counter + '"/></td>';
            column += '<td><input type="button" class="Del"  value="Delete"></td>';
            newRow.append(column);
            newRow.insertAfter($(this).closest("tr"));
        });

        $("table.table-colorstocks").on("click", ".Del", function (event) {
            $(this).closest("tr").remove();
        });

    </script>


    <script>
        // multiple stock-sizes
        jQuery(document).on('click', '.btn-delete-stocks', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });

        $(document).on("click", '.tdAddStock', function () {
            var counter = $('#size_table tbody tr').length + 1;
            var newRow = $("<tr>");
            var column = "";
            column += '<td><input type="button" value="Add Row" class="tdAddStock"/></td>';
            column += '<td><select name="size[]" required>' + counter + ' + ' +
                '@foreach($size as $value)' +
                '<option value="{{ $value->id}}">{{ $value->title}}</option>' +
                '@endforeach' + '</select></td>';
            column += '<td><select name="color[]" required>' + counter + ' + ' +
                '@foreach($color as $value)' +
                '<option value="{{ $value->id}}">{{ $value->title}}</option>' +
                '@endforeach' + '</select></td>';
            column += '<td><input type="number" name="size_stocks[]"  ' + counter + '"/></td>';
            column += '<td><input type="button" class="Del"  value="Delete"></td>';
            newRow.append(column);
            newRow.insertAfter($(this).closest("tr"));
        });

        $("table.table-stocks").on("click", ".Del", function (event) {
            $(this).closest("tr").remove();
        });

    </script>

    <script>

    </script>

    <script>
        $(document).on("click", '.tdAdd', function () {
            var counter = $('#myTable tbody tr').length + 1;
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="button" value="Add Row" class="tdAdd"/></td>';
            cols += '<td><input type="file" name="image[]"  ' + counter + '"/></td>';

            cols += '<td><input value="' + counter + '" class="radio1" type="radio" checked  name="is_main"/></td>';
            // cols += '<td><input type="button" class="ibtnDel"  value="Delete"></td>';
            newRow.append(cols);
            newRow.insertAfter($(this).closest("tr"));
        });

        {{--$("table.table-images").on("click", ".ibtnDel", function (event) {--}}
        {{--    var id = $(this).attr('data-id');--}}
        {{--    console.log(id);--}}

        {{--    if (!id) {--}}
        {{--        $(this).closest("tr").remove();--}}
        {{--    } else {--}}
        {{--        if (confirm('Are you sure')) {--}}
        {{--            $(this).closest("tr").remove();--}}
        {{--            var url = '{{ route("dlt-img", ":id") }}';--}}
        {{--            url = url.replace(':id', id);--}}
        {{--            var ImageCount = {{count($product->images)}};--}}

        {{--            $.ajax({--}}
        {{--                type: 'GET',--}}
        {{--                url: url,--}}
        {{--                contentType: false,--}}
        {{--                cache: false,--}}

        {{--                success: function (data) {--}}
        {{--                    if (data.left == 1) {--}}
        {{--                        $('.ibtnDel').hide();--}}
        {{--                    }--}}

        {{--                    if (data.status == 200) {--}}

        {{--                        toastr.success(data);--}}

        {{--                    }--}}

        {{--                },--}}
        {{--                error: function (a) {//if an error occurs--}}
        {{--                    // hideLoading();--}}
        {{--                    alert("An error occured while uploading data.\n error code : " + a.statusText);--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}

        {{--    }--}}


        {{--});--}}


    </script>


    <script>
        $(document).ready(function () {
            function showLoading() {
                document.getElementById("loading").style = "visibility: visible";
            }

            function hideLoading() {
                document.getElementById("loading").style = "visibility: hidden";
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form').on('submit', function (e) {
                e.preventDefault();

                // let main_img=$("input[name='is_main']:checked").val();
                let myform = document.getElementById('add_product');
                let formData = new FormData(myform);
                formData.append('id',{{$product->id}});


                // showLoading();
                $.ajax({
                    type: 'POST',
                    url: '{{route('edit-product')}}',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $("#loading-image").show();
                    },
                    success: function (data) {
                        console.log(data);
                        jQuery.each(data.errors, function (key, value) {
                            toastr.error(value);
                            // hideLoading();

                        });
                        if (data.status == 'success') {
                            toastr.success(data.message);
                        }
                        $("#loading-image").hide();
                        // hideLoading();

                    },
                    error: function (a) {//if an error occurs
                        // hideLoading();
                        alert("An error occured while uploading data.\n error code : " + a.statusText);
                    }
                });

            });

        });
    </script>

    <script>
        $(".table-images").on("click", ".remove_image", function (e) {
            e.preventDefault();
            let id = $(this).attr("id");
            var url = '{{ route("delete-img", ":id") }}';
            url = url.replace(':id', id);
            console.log("image_id : " + id);
            $.ajax(
                {
                    url: url,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (response) {
                        toastr.success(response.message);
                        location.reload();

                    },
                    error: function () {
                        alert("It failed");
                    }
                });

        });
    </script>


    <script>
        $(".table-colorstocks").on("click", ".remove_stock", function (e) {
            e.preventDefault();
            let id = $(this).attr("id");
            // alert(id);
            var url = '{{ route("delete-stock", ":id") }}';
            url = url.replace(':id', id);
            $.ajax(
                {
                    url: url,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (response) {
                        toastr.success(response.message);
                        location.reload();

                    },
                    error: function () {
                        alert("It failed");
                    }
                });

        });
    </script>

    <script>
        $(".table-images").on("click", ".is_main", function (event) {
            var id = $(this).attr("data-id");
            var url = '{{ route("change-main", ":id") }}';
            url = url.replace(':id', id);
            console.log(id);
            $.ajax(
                {
                    url: url,
                    type: 'GET',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // $(".jumbotron-image").load(" .jumbotron-image");
                        toastr.success(response.message);
                        console.log(response);
                    },
                    error: function () {
                        alert("It failed");
                    }
                });
        });
    </script>




@endpush

