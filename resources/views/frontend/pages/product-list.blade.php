@extends('frontend.include.master')
@section('content')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{route('index')}}"><i class="czi-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$category->first()->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{$category->first()->name}}</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4">
                <!-- Sidebar-->
                <div class="cz-sidebar rounded-lg box-shadow-lg" id="shop-sidebar">
                    <div class="cz-sidebar-header box-shadow-sm">
                        <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">Close sidebar</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="cz-sidebar-body">
                        <!-- Categories-->
                        <?php /*?>
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Categories</h3>
                            <div class="accordion mt-n1" id="shop-categories">
                                <!-- Shoes-->
                                @foreach($cat as $value)
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="accordion-heading"><a class="collapsed" href="#shoes"  data-toggle="collapse" aria-expanded="false" aria-controls="shoes">{{$value->name}}<span class="accordion-indicator"></span></a></h3>

                                        </div>
                                        <div class="collapse" id="shoes" data-parent="#shop-categories">
                                            <div class="card-body">
                                                <div class="widget widget-links cz-filter">
                                                    <div class="input-group-overlay input-group-sm mb-2">
                                                        {{--                            <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">--}}
                                                        {{--                            <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>--}}
                                                    </div>
                                                    <ul class="widget-list cz-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                                                        @foreach($value->subCategory as $child)

                                                            <li class="widget-list-item cz-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{route('product-list',$child->slug)}}"><span class="cz-filter-item-text">{{$child->name}}</span><span class="font-size-xs text-muted ml-3">{{$child->products->count()}}</span></a></li>
                                                            @foreach($child->subCategory as $value2)
                                                                <li class="widget-list-item pb-1">
                                                                    <a class="widget-list-link" href="{{route('product-list',$value2->slug)}}">{{$value2->name}}</a>
                                                                </li>
                                                            @endforeach
                                                        @endforeach

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <?php */?>
                        <!-- Price range-->
                        <div class="widget mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Price</h3>
                            <div class="cz-range-slider product_filter" data-start-min="0" data-start-max="30000" data-min="0" data-max="30000" data-step="1">
                                <div class="cz-range-slider-ui"></div>
                                <div class="d-flex pb-1">
                                    <div class="w-50 pr-2 mr-2">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend"><span class="input-group-text">Rs.</span></div>
                                            <input class="product_filter price_filter_min form-control cz-range-slider-value-min" type="text">
                                        </div>
                                    </div>
                                    <div class="w-50 pl-2">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend"><span class="input-group-text">Rs.</span></div>
                                            <input class="product_filter price_filter_max form-control cz-range-slider-value-max" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter by Brand-->
                        <div class="widget cz-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Brand</h3>
                            <div class="input-group-overlay input-group-sm mb-2">
                                <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                                <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                            </div>
                            <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                                @foreach($brand as $value1)
                                    <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input class="product_filter brand_filter custom-control-input" type="checkbox" id="{{'brand'.$value1->id}}" value="{{$value1->id}}">
                                            <label class="custom-control-label cz-filter-item-text" for="{{'brand'.$value1->id}}">{{$value1->brand_name}}</label>
                                        </div><span class="font-size-xs text-muted">425</span>
                                    </li>
                                @endforeach


                            </ul>
                        </div>

                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="form-inline flex-nowrap mr-3 mr-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap mr-2 d-none d-sm-block" for="sorting">Sort by:</label>
                            <select class="item_sort form-control custom-select" id="sorting">
                                <option selected="selected" value="">--Select--</option>
                                <option value="popular">Popularity</option>
                                <option value="low_to_high">Low - High Price</option>
                                <option value="high_to_low">High - Low Price</option>
                                <option value="a_to_z">A - Z Order</option>
                                <option value="z_to_a">Z - A Order</option>
                            </select><span class="font-size-sm text-light opacity-75 text-nowrap ml-2 d-none d-md-block">of {{$products->count()}} products</span>
                        </div>
                    </div>
{{--                    <div class="d-flex pb-3"><a class="nav-link-style nav-link-light mr-3" href="#"><i class="czi-arrow-left"></i></a><span class="font-size-md text-light">1 / 5</span><a class="nav-link-style nav-link-light ml-3" href="#"><i class="czi-arrow-right"></i></a></div>--}}

                </div>
                <!-- Products grid-->
                <div class="filter product_filter_result ">
                    <div class="row mx-n2" >
                        <!-- Product-->
                        {{--              {{$products}}--}}
                        @if($products->count()==0)
                            <span class="center">No Products To Show.</span>
                        @endif
                        @if($products->isNotEmpty())
                            @foreach($products->take(12) as $value)
                                <input type="hidden" id="product_id" value="{{$value->id}}">
                                <div class="col-md-4 col-sm-6 px-2 mb-4">
                                    <div class="card product-card">
                                        <a class="btn-wishlist btn-sm" href="{{route('add-wishlist',$value->id)}}"
                                           type="button" data-toggle="tooltip" data-placement="left"
                                           title="Add to wishlist"><i class="czi-heart"></i></a>
                                        @if($value->images->isNotEmpty())
                                            <a class="card-img-top d-block overflow-hidden" href="{{route('product-details',$value->slug)}}"><img src="{{asset('images/products/'.$value->images->where('is_main','=',1)->first()->image)}}" alt="Product"></a>
                                        @endif
                                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{route('product-details',$value->slug)}}">{{$value->categories->first()->name}}</a>
                                            <h3 class="product-title font-size-sm"><a href="{{route('product-details',$value->slug)}}">{{$value->product_name}}</a></h3>
                                            <div class="d-flex justify-content-between">
                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->roles=='wholeseller')
                                                    <div class="product-price">Rs.<span class="text-accent">{{$value->wholesale_price}}.<small>00</small></span></div>
                                                @else
                                                    <div class="product-price">Rs.<span class="text-accent">{{$value->discount_price}}.<small>00</small></span></div>
                                                @endif
                                               @if($value->reviews->isNotEmpty())
                                                    <div class="star-rating">
                                                        @for ($i=0; $i< generateReview($value->slug); $i++)
                                                            <i class="sr-star czi-star-filled active [$i]"></i>
                                                        @endfor
                                                    </div>
                                                @else
                                                    <div class="star-rating">
                                                        <i class="sr-star czi-star-filled"></i>
                                                        <i class="sr-star czi-star-filled"></i>
                                                        <i class="sr-star czi-star-filled"></i>
                                                        <i class="sr-star czi-star-filled"></i>
                                                        <i class="sr-star czi-star-filled"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        {{--                <div class="card-body card-body-hidden">--}}
                                        {{--                  <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>--}}
                                        {{--                  <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-{{$value->id}}" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>--}}
                                        {{--                </div>--}}
                                    </div>
                                    <hr class="d-sm-none">
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- Products grid-->
                </div>

                <hr class="my-3">

                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item"><a class="page-link" href="#"><i class="czi-arrow-left mr-2"></i>Prev</a></li>--}}
{{--                    </ul>--}}
                    <ul class="pagination">
                       {{$products->links()}}
                    </ul>
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="czi-arrow-right ml-2"></i></a></li>--}}
{{--                    </ul>--}}
                </nav>
            </section>
        </div>
    </div>


    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
        <div class="d-table table-fixed w-100"><a class="d-table-cell cz-handheld-toolbar-item" href="#shop-sidebar" data-toggle="sidebar"><span class="cz-handheld-toolbar-icon"><i class="czi-filter-alt"></i></span><span class="cz-handheld-toolbar-label">Filters</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="account-wishlist.php"><span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span><span class="cz-handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.php"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">$265.00</span></a>
        </div>
    </div>
@endsection
@push('scripts')
    <script>


        $('.size_stock').click(function () {
            let free_size = $('.free_size').val();
            let color = this.value;
            getStock(free_size, color);
        });
        $('.free_size').on('change', function () {
            var color = $("input[type='radio'].size_stock:checked").val();
            console.log(color);
            var freesize = this.value;
            getStock(freesize, color);
        });

        $(window).on("load", function () {
            var color = $("input[type='radio'].size_stock:checked").val();
            var size = $('select[name=size] option').filter(':selected').val();
            getStock(size, color);

        });



        $('#cart_btn').on('click', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            let myform = document.getElementById('add_to_cart');
            let formData = new FormData(myform);

            $.ajax({
                type: 'POST',
                url: '{{route('cart-add')}}',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    console.log(data);
                    jQuery.each(data.errors, function (key, value) {
                        toastr.error(value);
                        // hideLoading();

                    });
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    }


                },
                error: function (a) {//if an error occurs
                    // hideLoading();
                    alert("An error occured while uploading data.\n error code : " + a.statusText);
                }
            });


        });
        // filter
        $(document).ready(function () {


            $('.product_filter').bind("click change keyup",function (e){
                let size_variations= multilple_values('size_filter');
                console.log(size_variations);
                let brand_variation=multilple_values('brand_filter');
                console.log(brand_variation);
                let price_variation_min=$('.price_filter_min').val();
                let price_variation_max=$('.price_filter_max').val();

                var slug= "{{$category_slug}}";

                function multilple_values(inputclass) {
                    var val = new Array();
                    $.each($("." + inputclass + ":checked"), function() {
                        val.push($(this).val());
                    });
                    return val;
                }

                $.ajax({
                    type: 'GET',
                    url: '{{route('product-list')}}',
                    data:{
                        brand: brand_variation,
                        size: size_variations,
                        slug: slug,
                        min_price:price_variation_min,
                        max_price:price_variation_max,
                    },

                    success:function (response) {
                        $('.product_filter_result').replaceWith($('.product_filter_result')).html(response);
                    }
                });
            });
            $('.item_sort').change(function (e) {
                var val = $(this).find(':checked').val();
                console.log(val);

                $.ajax({
                    url: document.URL,
                    type: 'get',
                    data: {
                        value: val,
                    },
                    success: function (result) {
                        console.log(result);

                        $('.product_filter_result').replaceWith($('.product_filter_result')).html(result);
                    }
                });

            })

            //

        });
    </script>
@endpush
