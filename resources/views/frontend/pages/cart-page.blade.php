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
                        <li class="breadcrumb-item text-nowrap"><a href="{{route('index')}}">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">Your cart</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row remove-cart">
            <!-- List of items-->
            <section class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm pl-2"
                                                                   href="{{route('index')}}"><i
                            class="czi-arrow-left mr-2"></i>Continue shopping</a>
                </div>
                <!-- Item-->
                {{--            {{$cartItem}}--}}
                <form method="post" action="{{route('cart-update')}}">
                    @csrf
                    @foreach($cartItem as $value)
                        <input type="hidden" name="id[]" value="{{$value->rowId}}">

                        <div class="d-sm-flex justify-content-between align-items-center my-4 pb-3 border-bottom">
                            <div
                                class="media media-ie-fix d-block d-sm-flex align-items-center text-center text-sm-left">
                                <a class="d-inline-block mx-auto mr-sm-4" href="{{'/product-details'}}"
                                   style="width: 10rem;"><img src="{{url('images/products/'.$value->options->image)}}"
                                                              alt="Product"></a>
                                <div class="media-body pt-2">
                                    <h3 class="product-title font-size-base mb-2"><a
                                            href="{{'/product-details'}}">{{$value->name}}</a></h3>
                                    @if($value->options->size=="")
                                        <div class="font-size-sm"><span class="text-muted mr-2">Size:</span>Free Size
                                        </div>
                                    @else
                                        <div class="font-size-sm"><span
                                                class="text-muted mr-2">Size:</span>{{$value->options->size}}</div>
                                    @endif

                                    <div class="font-size-sm"><span
                                            class="text-muted mr-2">Color:</span>{{$value->options->color}}</div>
                                    {{--                  @if(\Illuminate\Support\Facades\Auth::user()->roles=='wholeseller')--}}
                                    {{--                      <div class="font-size-lg text-accent pt-2">{{$value->wholesale_price}}.<small>00</small></div>--}}
                                    {{--                  @else--}}
                                    <div class="font-size-lg text-accent pt-2">{{$value->price}}.<small>00</small></div>
                                    {{--                      @endif--}}
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left"
                                 style="max-width: 9rem;">
                                <div class="form-group mb-0">
                                    <label class="font-weight-medium" for="quantity1">Quantity</label>
                                    <input class="form-control" name="quantity[]" min="1" type="number" id="quantity1"
                                           value="{{$value->qty}}">
                                </div>
                                <a href="{{route('cart-remove',$value->rowId)}}"
                                   class="btn btn-link px-0 text-danger"><i class="czi-close-circle mr-2"></i><span
                                        class="font-size-sm">Remove</span></a>
                            </div>
                        </div>
                @endforeach
                <!-- Item-->
{{--                    {{$value->options->stock}}--}}

                    <button class="update_cart btn btn-outline-accent btn-block" type="submit"><i
                            class="czi-loading font-size-base mr-2"></i>Update cart
                    </button>
                </form>

            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0">
                <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                        <h3 class="font-weight-normal">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</h3>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="order-comments"><span
                                class="badge badge-info font-size-xs mr-2">Note</span><span class="font-weight-medium">Additional comments</span></label>
                        <textarea class="form-control" rows="6" id="order-comments"></textarea>
                    </div>
{{--                    <div class="accordion" id="order-options">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="accordion-heading"><a href="#promo-code" role="button" data-toggle="collapse"--}}
{{--                                                                 aria-expanded="true" aria-controls="promo-code">Apply--}}
{{--                                        promo code<span class="accordion-indicator"></span></a></h3>--}}
{{--                            </div>--}}
{{--                            <div class="collapse show" id="promo-code" data-parent="#order-options">--}}
{{--                                <form class="card-body needs-validation" method="post" novalidate>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" type="text" placeholder="Promo code" required>--}}
{{--                                        <div class="invalid-feedback">Please provide promo code.</div>--}}
{{--                                    </div>--}}
{{--                                    <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                                      <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                          <h3 class="accordion-heading"><a class="collapsed" href="#shipping-estimates" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shipping-estimates">Shipping estimates<span class="accordion-indicator"></span></a></h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="collapse" id="shipping-estimates" data-parent="#order-options">--}}
{{--                                          <div class="card-body">--}}
{{--                                            <form class="needs-validation" novalidate>--}}
{{--                                              <div class="form-group">--}}
{{--                                                <select class="form-control custom-select" required>--}}
{{--                                                  <option value="">Choose your country</option>--}}
{{--                                                  <option value="Australia">Australia</option>--}}
{{--                                                  <option value="Belgium">Belgium</option>--}}
{{--                                                  <option value="Canada">Canada</option>--}}
{{--                                                  <option value="Finland">Finland</option>--}}
{{--                                                  <option value="Mexico">Mexico</option>--}}
{{--                                                  <option value="New Zealand">New Zealand</option>--}}
{{--                                                  <option value="Switzerland">Switzerland</option>--}}
{{--                                                  <option value="United States">United States</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="invalid-feedback">Please choose your country!</div>--}}
{{--                                              </div>--}}
{{--                                              <div class="form-group">--}}
{{--                                                <select class="form-control custom-select" required>--}}
{{--                                                  <option value="">Choose your city</option>--}}
{{--                                                  <option value="Bern">Bern</option>--}}
{{--                                                  <option value="Brussels">Brussels</option>--}}
{{--                                                  <option value="Canberra">Canberra</option>--}}
{{--                                                  <option value="Helsinki">Helsinki</option>--}}
{{--                                                  <option value="Mexico City">Mexico City</option>--}}
{{--                                                  <option value="Ottawa">Ottawa</option>--}}
{{--                                                  <option value="Washington D.C.">Washington D.C.</option>--}}
{{--                                                  <option value="Wellington">Wellington</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="invalid-feedback">Please choose your city!</div>--}}
{{--                                              </div>--}}
{{--                                              <div class="form-group">--}}
{{--                                                <input class="form-control" type="text" placeholder="ZIP / Postal code" required>--}}
{{--                                                <div class="invalid-feedback">Please provide a valid zip!</div>--}}
{{--                                              </div>--}}
{{--                                              <button class="btn btn-outline-primary btn-block" type="submit">Calculate shipping</button>--}}
{{--                                            </form>--}}
{{--                                          </div>--}}
{{--                                        </div>--}}
{{--                                      </div>--}}
{{--                    </div>--}}
                    <a class="btn btn-primary btn-shadow btn-block mt-4" href="{{route('checkout-address')}}"><i
                            class="czi-card font-size-lg mr-2"></i>Proceed to Checkout</a>
                </div>
            </aside>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.update_cart').on('click', function (e) {

            $.ajax({});
        });
    </script>
@endpush
