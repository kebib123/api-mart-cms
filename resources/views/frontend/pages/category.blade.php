@extends('frontend.include.master')
@section('content')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2> Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('index')}}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        <ul>
                            @foreach ($all_cat as $value)
                            <li><a href="{{route('product-list',$value->slug)}}">{{$value->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>{{$category->first()->name}}</h2>
                    </div>
                      <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Price</option>
                                    <option value="0">Latest</option>

                                </select>
                            </div>
                        </div>


                    </div>
                </div>
                    <div class="row">
                        <!-- <div class="product__discount__slider owl-carousel"> -->
                            @if($products->count()==0)
                            <span class="center">No Products To Show.</span>
                        @endif
                        @if($products->isNotEmpty())
                        @foreach($products->take(9) as $value)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{asset('images/products/'.$value->images->where('is_main','=',1)->first()->image)}}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="{{route('product-details',$value->slug)}}">{{$value->product_name}}</a></h5>
                                        <div class="product__item__price">${{$value->discount_price}} <span>${{$value->price}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif 

                        <!-- </div> -->
                    </div>
                </div>


                <div class="product__pagination">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@stop
