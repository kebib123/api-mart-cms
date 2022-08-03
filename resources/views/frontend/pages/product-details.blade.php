@extends('frontend.include.master')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{route('index')}}"><i class="czi-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap">
                            <a href="{{route('product-list',$product->categories->first()->slug)}}">{{$product->categories->first()->name}}</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$product->product_name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{$product->product_name}}</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container">
        <!-- Gallery + details-->
        <div class="bg-light box-shadow-lg rounded-lg px-4 py-3 mb-5">
            <div class="px-lg-3">
                <div class="row">
                    <!-- Product gallery-->
                    <div class="col-lg-7 pr-lg-0 pt-lg-4">
                        <div class="cz-product-gallery">
                            <div class="cz-preview order-sm-2">

                                <div class="cz-preview-item active" id="first"><img class="cz-image-zoom"
                                                                                    src="{{asset('images/products/'.$product->images->where('is_main','=',1)->first()->image)}}"
                                                                                    data-zoom="{{asset('images/products/'.$product->images->where('is_main','=',1)->first()->image)}}"
                                                                                    alt="Product image">
                                    <div class="cz-image-zoom-pane"></div>
                                </div>
                                @foreach($product->images->where('is_main',0) as $key=>$img)

                                    <div class="cz-preview-item" id="second"><img class="cz-image-zoom"
                                                                                  src="{{asset('/images/products/'.$img->image)}}"
                                                                                  data-zoom="{{asset('/images/products/'.$img->image)}}"
                                                                                  alt="Product image">
                                        <div class="cz-image-zoom-pane"></div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="cz-thumblist order-sm-1">
                                <a class="cz-thumblist-item active" href="#first"><img
                                        src="{{asset('images/products/'.$product->images->where('is_main','=',1)->first()->image)}}"
                                        alt="Product thumb"></a>
                                @foreach($product->images->where('is_main',0) as $key=>$img)

                                    <a class="cz-thumblist-item" href="#second"><img
                                            src="{{asset('/images/products/'.$img->image)}}" alt="Product thumb"></a>
                                @endforeach

                                {{--                                <a class="cz-thumblist-item video-item"--}}
                                {{--                                   href="https://www.youtube.com/watch?v=1vrXpMLLK14">--}}
                                {{--                                    <div class="cz-thumblist-item-text"><i class="czi-video"></i>Video</div>--}}
                                {{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                    <!-- Product details-->
                    <div class="col-lg-5 pt-4 pt-lg-0">
                        <div class="product-details ml-auto pb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews"
                                                                                                   data-scroll>
                                    @if($product->reviews->isNotEmpty())
                                        <div class="star-rating">
                                            @for ($i=0; $i<$average; $i++)
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
                                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">{{$product->reviews->count()}} Reviews</span></a>
                                <button class="btn-wishlist mr-0 mr-lg-n3" type="button" id="product_wishlist"
                                        data-toggle="tooltip"
                                        title="Add to wishlist"><i class="czi-heart"></i></button>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->roles=='wholeseller')
                                <div class="mb-3">Rs.<span class="h3 font-weight-normal text-accent mr-1">{{$product->wholesale_price}}.<small>00</small></span>
                                    {{--                                @if($product->on_sale==1)--}}
                                    {{--                                    <del class="text-muted font-size-lg mr-3">{{$product->discount_price}}.<small>00</small>--}}
                                    {{--                                    </del><span class="badge badge-danger badge-shadow align-middle mt-n2">Sale</span>--}}
                                    {{--                                @endif--}}
                                </div>
                            @else
                                <div class="mb-3">Rs.<span class="h3 font-weight-normal text-accent mr-1">{{$product->discount_price}}.<small>00</small></span>
                                    @if($product->on_sale==1)
                                        <del class="text-muted font-size-lg mr-3">{{$product->price}}.<small>00</small>
                                        </del><span class="badge badge-danger badge-shadow align-middle mt-n2">Sale</span>
                                    @endif
                                </div>

                            @endif
                            <form class="mb-grid-gutter" id="add_to_cart">
                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="font-size-sm mb-4"><span
                                        class="text-heading font-weight-medium mr-1">Color:</span><span
                                        class="text-muted" id="colorOption"></span></div>
                                <div class="position-relative mr-n4 mb-3">
                                    {{--                                    //freesize wala//--}}
                                    @if(isset($product->colorstocks))
                                        @foreach($product->colorstocks as $value)
                                            <div class="custom-control custom-option custom-control-inline mb-2">
                                                <input class="custom-control-input size_stock" type="radio" name="color"
                                                       id="{{$value->title}}" data-label="colorOption"
                                                       value="{{$value->title}}" checked>
                                                <label class="custom-option-label rounded-circle"
                                                       for="{{$value->title}}"><span
                                                        class="custom-option-color rounded-circle"
                                                        style="background-color:{{$value->title}}"></span></label>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{--                                    size with stock--}}
                                    @if(isset($product->stocks))
                                        @foreach($product->stocks as $value1)
                                            <div class="custom-control custom-option custom-control-inline mb-2">
                                                <input class="custom-control-input size_stock" type="radio" name="color"
                                                       id="{{$value1->colors->title}}"
                                                       data-label="colorOption" value="{{$value1->colors->title}}"
                                                       checked>
                                                <label class="custom-option-label rounded-circle"
                                                       for="{{$value1->colors->title}}"><span
                                                        class="custom-option-color rounded-circle"
                                                        style="background-color:{{$value1->colors->title}}"></span></label>
                                            </div>

                                        @endforeach
                                    @endif
                                    <div class="product-badge product-available mt-n1"><i
                                            class="czi-security-check"></i>Product available
                                    </div>
                                </div>
                                <h4 id="stock_qty">In Stock:</h4>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center pb-1">
                                        <label class="font-weight-medium" for="product-size">Size:</label><a
                                            class="nav-link-style font-size-sm" href="#size-chart"
                                            data-toggle="modal"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i>Size
                                            guide</a>
                                    </div>
                                    @if(isset($product->stocks)&&($product->size_variation==1))
                                        <select class="custom-select free_size" name="size" required>
                                            <option value="" selected disabled>Select size</option>

                                            @foreach($product->stocks as $stock)
                                                <option value="{{$stock->size->title}}"
                                                        selected>{{$stock->size->title}}</option>
                                            @endforeach
                                            @else
                                                <h3>Free Size</h3>
                                            @endif
                                        </select>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    {{--                    <select class="custom-select mr-3" name="quantity" style="width: 5rem;">--}}
                                    {{--                      <option value="1">1</option>--}}
                                    {{--                      <option value="2">2</option>--}}
                                    {{--                      <option value="3">3</option>--}}
                                    {{--                      <option value="4">4</option>--}}
                                    {{--                      <option value="5">5</option>--}}
                                    {{--                    </select>--}}
                                    <input type="number" name="quantity" min="1" max=""
                                           class="form-control" id="stock_limit" style="width: 5rem;">

                                    <button class="btn btn-primary btn-shadow btn-block" id="cart_btn"><i
                                            class="czi-cart font-size-lg mr-2"></i>Add to Cart
                                    </button>
                                </div>
                            </form>
                            <!-- Product panels-->
                            <div class="accordion mb-4" id="productPanels">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="accordion-heading"><a href="#productInfo" role="button"
                                                                         data-toggle="collapse" aria-expanded="true"
                                                                         aria-controls="productInfo"><i
                                                    class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>Product
                                                info<span class="accordion-indicator"></span></a></h3>
                                    </div>
                                    <div class="collapse show" id="productInfo" data-parent="#productPanels">
                                        <div class="card-body">
                                            {!! $product->short_description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sharing-->
{{--                            <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">Share:</h6>--}}
{{--                            <a class="share-btn sb-twitter mr-2 my-2" href="#"><i class="czi-twitter"></i>Twitter</a>--}}
{{--                            <a class="share-btn sb-instagram mr-2 my-2" href="#"><i class="czi-instagram"></i>Instagram</a>--}}
{{--                            <a class="share-btn sb-facebook my-2" href="#"><i class="czi-facebook"></i>Facebook</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Product description-->
    <div class="container pt-lg-3 pb-4 pb-sm-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="h3 pb-2">Detailed Description</h2>
                <p>
                    {!! $product->long_description !!}
                </p>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($product->descriptions as $key=>$value)
                        <li class="nav-item">
                            <a href="#tab{{$key+=1}}" class="nav-link " data-toggle="tab" role="tab">
                                {{$value->title}}
                            </a>
                        </li>

                    @endforeach

                </ul>

                <!-- Tabs content -->
                <div class="tab-content">
                    @foreach($product->descriptions as  $key=>$value)
                        <div class="tab-pane fade show" id="tab{{$key+=1}}" role="tabpanel">
                            <p>
                                {{$value->description}}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    @include('frontend.pages.additonal_single_page')

@endsection

@push('scripts')

    <script>
        $(document).ready(function () {

            // $('.size_stock').click(function () {
            //     console.log('ok');
            //     let free_size = $('.free_size').val();
            //     let color = this.value;
            //     getStock(free_size, color);
            // });
            $('.free_size').on('change', function () {
                var color = $("input[type='radio'].size_stock:checked").val();
                console.log(color);
                var freesize = this.value;
                getStock(freesize, color);
            });

        });
        $(window).on("load", function () {
            var color = $("input[type='radio'].size_stock:checked").val();
            var size = $('select[name=size] option').filter(':selected').val();
            getStock(size, color);

        });

        function getStock(free_size, color,) {
            $.ajax({
                type: 'GET',
                url: '{{route('cart-filter')}}',
                data: {
                    free_size: free_size,
                    color: color,
                    product_id:{{$product->id}}
                },


                success: function (data) {
                    $('#stock_limit').val("1");

                    $('#stock_limit').attr({
                        'max':data.stock_amount
                    });
                    if (data.stock_amount == 0) {
                        document.getElementById("stock_qty").innerHTML = 'Out of stock';
                        $('#stock_limit').prop("disabled", true);

                    } else {
                        document.getElementById("stock_qty").innerHTML = 'In Stock:'.concat(data.stock_amount);
                        $('#stock_limit').prop("disabled", false);
                    }
                },

            });
        }

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
                    // console.log(data);
                    if (!data.errors) {

                        $('.mini-cart').replaceWith($('.mini-cart')).html(data);
                        toastr.success('Item added to cart');

                    }
                    jQuery.each(data.errors, function (key, value) {

                        toastr.error(value);
                        // hideLoading();

                    })
                },
                error: function (a) {//if an error occurs
                    // hideLoading();
                    alert("An error occured while uploading data.\n error code : " + a.statusText);
                }
            });


        });

    </script>
@endpush
