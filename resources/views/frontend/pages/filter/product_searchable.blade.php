@extends('frontend.include.master')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{route('index')}}"><i
                                    class="czi-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Search Results</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">Search Results</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">

            <!-- Content  -->
            <section class="col-lg-12">
                <!-- Toolbar-->
                <div
                    class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="form-inline flex-nowrap mr-3 mr-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap mr-2 d-none d-sm-block" for="sorting">Sort
                                by:</label>
                            <select class="item_sort form-control custom-select" id="sorting">
                                <option selected="selected" value="">--Select--</option>
                                <option value="popular">Popularity</option>
                                <option value="low_to_high">Low - Hight Price</option>
                                <option value="high_to_low">High - Low Price</option>
                                {{--                  <option>Average Rating</option>--}}
                                <option value="a_to_z">A - Z Order</option>
                                <option value="z_to_a">Z - A Order</option>
                            </select><span
                                class="font-size-sm text-light opacity-75 text-nowrap ml-2 d-none d-md-block">of {{count($products)}} products</span>
                        </div>
                    </div>
                    <div class="d-flex pb-3">
                        {{--                        <a class="nav-link-style nav-link-light mr-3" href="#"><i--}}
                        {{--                                class="czi-arrow-left"></i></a><span class="font-size-md text-light">1 / 5</span><a--}}
                        {{--                            class="nav-link-style nav-link-light ml-3" href="#"><i class="czi-arrow-right"></i></a>--}}
                    </div>

                </div>
                <!-- Products grid-->
                <div class="row mx-n2" id="product_filter_result">
                    <!-- Product-->
                    @if($products->isNotEmpty())
                        @foreach($products as $value)
                            <input type="hidden" id="product_id" value="{{$value->id}}">
                            <div class="col-md-4 col-sm-6 px-2 mb-4">
                                <div class="card product-card">
                                    <a class="btn-wishlist btn-sm" href="{{route('add-wishlist',$value->id)}}"
                                       data-toggle="tooltip" data-placement="left"
                                       title="Add to wishlist"><i class="czi-heart"></i></a>
                                    @if($value->images->isNotEmpty())
                                        <a class="card-img-top d-block overflow-hidden"
                                           href="{{route('product-details',$value->slug)}}"><img
                                                src="{{asset('images/products/'.$value->images->where('is_main','=',1)->first()->image)}}"
                                                alt="Product"></a>
                                    @endif

                                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                                                                   href="{{route('product-details',$value->slug)}}">{{$value->categories->first()->name}}</a>
                                        <h3 class="product-title font-size-sm"><a
                                                href="{{route('product-details',$value->slug)}}">{{$value->product_name}}</a>
                                        </h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="product-price">Rs.<span
                                                    class="text-accent">{{$value->price}}.<small>00</small></span></div>
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

                                </div>
                                <hr class="d-sm-none">
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">
                            <h3>No matching results found</h3>
                        </div>
                    @endif

                </div>


                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        {{--                        <li class="page-item"><a class="page-link" href="#"><i class="czi-arrow-left mr-2"></i>Prev</a>--}}
                        {{--                        </li>--}}
                    </ul>
                    <ul class="pagination">
                        {{$products->links()}}
                    </ul>
                    <ul class="pagination">
                        {{--                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i--}}
                        {{--                                    class="czi-arrow-right ml-2"></i></a></li>--}}
                    </ul>
                </nav>
            </section>
        </div>
    </div>
    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
        <div class="d-table table-fixed w-100"><a class="d-table-cell cz-handheld-toolbar-item"
                                                  href="{{route('wishlist')}}"><span class="cz-handheld-toolbar-icon"><i
                        class="czi-heart"></i></span><span class="cz-handheld-toolbar-label">Wishlist</span></a><a
                class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse"
                onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i
                        class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a
                class="d-table-cell cz-handheld-toolbar-item" href="{{route('cart-item')}}"><span
                    class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span
                        class="badge badge-primary badge-pill ml-1">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span></span><span
                    class="cz-handheld-toolbar-label">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></a>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

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
                        $('#product_filter_result').replaceWith($('#product_filter_result')).html(result);
                    }
                });

            })

        });

    </script>
@endpush
