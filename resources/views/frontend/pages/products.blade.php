@extends('frontend.include.master')
@section('content')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Home</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('product-list',$product->categories->first()->slug)}}">{{$product->categories->first()->name}}</a>
                        <span>{{$product->product_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{asset('images/products/'.$product->images->where('is_main','=',1)->first()->image)}}" alt="{{$product->product_name}}">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($product->images->where('is_main',0) as $key=>$img)
                        <img data-imgbigurl="{{asset('/images/products/'.$img->image)}}"
                            src="{{asset('/images/products/'.$img->image)}}" alt="{{$product->product_name}}">
                            @endforeach
                        {{-- <img data-imgbigurl="{{asset('img/product/details/product-details-3.jpg')}}"
                            src="{{asset('img/product/details/thumb-2.jpg')}}" alt="">
                        <img data-imgbigurl="{{asset('img/product/details/product-details-5.jpg')}}"
                            src="{{asset('img/product/details/thumb-3.jpg')}}" alt="">
                        <img data-imgbigurl="{{asset('img/product/details/product-details-4.jpg')}}"
                            src="{{asset('img/product/details/thumb-4.jpg')}}" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form class="mb-grid-gutter" id="add_to_cart">
                    <input type="hidden" name="product_id" value="{{$product->id}}">

                <div class="product__details__text">
                    <h3>{{$product->product_name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">${{$product->discount_price}} <span class="span1">${{$product->price}}</span></div>
                       {!!$product->short_description!!}
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="quantity" min="1" max="">
                            </div>
                        </div>
                    </div>
                    <button id="cart_btn" class="primary-btn">ADD TO CART</button>
                    <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Stock</b> <span></span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </li>
                    </ul>



                </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                               {!!$product->long_description!!}
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                        <ul class="product__item__pic__hover">

                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                        <ul class="product__item__pic__hover">

                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                        <ul class="product__item__pic__hover">

                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                        <ul class="product__item__pic__hover">

                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@stop


@push('scripts')

    <script>
        // $(document).ready(function () {

        //     $('.size_stock').click(function () {
        //         console.log('ok');
        //         let free_size = $('.free_size').val();
        //         let color = this.value;
        //         getStock(free_size, color);
        //     });
        //     $('.free_size').on('change', function () {
        //         var color = $("input[type='radio'].size_stock:checked").val();
        //         console.log(color);
        //         var freesize = this.value;
        //         getStock(freesize, color);
        //     });

        // });
        // $(window).on("load", function () {
        //     var color = $("input[type='radio'].size_stock:checked").val();
        //     var size = $('select[name=size] option').filter(':selected').val();
        //     getStock(size, color);

        // });

        // function getStock(free_size, color,) {
        //     $.ajax({
        //         type: 'GET',
        //         url: '{{route('cart-filter')}}',
        //         data: {
        //             free_size: free_size,
        //             color: color,
        //             product_id:{{$product->id}}
        //         },


        //         success: function (data) {
        //             $('#stock_limit').val("1");

        //             $('#stock_limit').attr({
        //                 'max':data.stock_amount
        //             });
        //             if (data.stock_amount == 0) {
        //                 document.getElementById("stock_qty").innerHTML = 'Out of stock';
        //                 $('#stock_limit').prop("disabled", true);

        //             } else {
        //                 document.getElementById("stock_qty").innerHTML = 'In Stock:'.concat(data.stock_amount);
        //                 $('#stock_limit').prop("disabled", false);
        //             }
        //         },

        //     });
        // }

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
