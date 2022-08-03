@extends('frontend.include.master')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{route('index')}}"><i class="czi-home"></i>Home</a></li>
{{--              <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.php">Shop</a>--}}
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <section class="col-lg-8">
          <!-- Steps-->
          <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="{{route('cart-item')}}">
              <div class="step-progress"><span class="step-count">1</span></div>
              <div class="step-label"><i class="czi-cart"></i>Cart</div></a><a class="step-item active current" href="{{route('checkout-address')}}">
              <div class="step-progress"><span class="step-count">2</span></div>
              <div class="step-label"><i class="czi-user-circle"></i>Your details</div></a><a class="step-item" href="{{'checkout-shipping'}}">
{{--              <div class="step-progress"><span class="step-count">3</span></div>--}}
{{--              <div class="step-label"><i class="czi-package"></i>Shipping</div></a><a class="step-item" href="{{route('checkout-payment')}}">--}}
              <div class="step-progress"><span class="step-count">4</span></div>
              <div class="step-label"><i class="czi-card"></i>Payment</div></a><a class="step-item" href="{{route('checkout-review')}}">
              <div class="step-progress"><span class="step-count">5</span></div>
              <div class="step-label"><i class="czi-check-circle"></i>Review</div></a></div>
          <!-- Autor info-->
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-lg mb-grid-gutter">
            <div class="media align-items-center">
              <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"> <img class="rounded-circle" src="{{asset('images/user.png')}}" alt="Susan Gardner"></div>
                <div class="media-body pl-3">
                    <h3 class="font-size-base mb-0">{{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h3><span class="text-accent font-size-sm">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                </div>
            </div>
              <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="{{route('user-profile')}}"><i class="czi-edit mr-2"></i>Edit profile</a>
          </div>
          <!-- Shipping address-->
          <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
            <form id="address_form">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-fn">First Name</label>
                <input class="form-control" name="first_name" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}" type="text" id="checkout-fn">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-ln">Last Name</label>
                <input class="form-control" name="last_name" value={{\Illuminate\Support\Facades\Auth::user()->last_name}}" type="text" id="checkout-ln">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-email">E-mail Address</label>
                <input class="form-control" name="email" type="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" id="checkout-email">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-phone">Phone Number</label>
                <input class="form-control" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" type="text" id="checkout-phone">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                  <label for="title">Select Country:</label>
                  <select name="country" id="country" class="form-control" style="width:350px">
                      <option value="" selected disabled>Select any country</option>
                      @foreach($countries as $id=>$value)
                          <option value="{{$id+=1}}">{{$value->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-city">City:</label>
                  <select name="city" id="city" class="form-control" style="width:350px">
                      <option value="" selected disabled>Select any city</option>
                      @foreach($shipping as $id=>$value)
                          <option id="{{$value->id}}" value="{{$value->shipping_price}}">{{$value->shipping_location}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-zip">ZIP Code</label>
                  @if(\Illuminate\Support\Facades\Auth::user()->addresses!=null)
                <input class="form-control" name="zip_code" value="{{\Illuminate\Support\Facades\Auth::user()->addresses->zip_code}}" type="text" id="checkout-zip">
                 @else
                  <input class="form-control" name="zip_code" type="text" id="checkout-zip">
                  @endif

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-1">Address 1</label>
                  @if(\Illuminate\Support\Facades\Auth::user()->addresses!=null)
                <input class="form-control" name="address_1" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->addresses->address1}}" id="checkout-address-1">
           @else
                  <input class="form-control" name="address_1" type="text" id="checkout-address-1">
                      @endif

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-2">Address 2</label>
                  @if(\Illuminate\Support\Facades\Auth::user()->addresses!=null)
                <input class="form-control" name="address_2" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->addresses->address2}}" id="checkout-address-2">
                  @else
                      <input class="form-control" name="address_2" type="text"  id="checkout-address-2">
                  @endif

              </div>
            </div>
          </div>
{{--          <h6 class="mb-3 py-3 border-bottom">Billing address</h6>--}}
{{--          <div class="custom-control custom-checkbox">--}}
{{--            <input class="custom-control-input" type="checkbox" checked id="same-address">--}}
{{--            <label class="custom-control-label" for="same-address">Same as shipping address</label>--}}
{{--          </div>--}}
          <!-- Navigation (desktop)-->
          <div class="d-none d-lg-flex pt-4 mt-3">
            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{route('cart-item')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" id="payment_page" href="javascript:void(0)"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
{{--            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" id="shipping_page" href="{{route('checkout-payment')}}"><span class="d-none d-sm-inline">Proceed to Payment</span><span class="d-inline d-sm-none">Next</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>--}}
          </div>
            </form>
        </section>
        <!-- Sidebar-->
          @if(\Gloudemans\Shoppingcart\Facades\Cart::content()->isNotEmpty())

          <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="widget mb-3">
              <h2 class="widget-title text-center">Order summary</h2>

                @foreach($cartItem as $value)
              <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="{{'/product-details'}}"><img width="64" src="{{url('images/products/'.$value->options->image)}}" alt="Product"/></a>
                <div class="media-body">
                  <h6 class="widget-product-title"><a href="{{'/product-details'}}">{{$value->name}}</a></h6>
                  <div class="widget-product-meta"><span class="text-accent mr-2">{{$value->price}}.<small>00</small></span><span class="text-muted">x {{$value->qty}}</span></div>
                </div>
              </div>
                @endforeach

            </div>
            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Subtotal:</span><span class="text-right subtotal">{{$final}}</span></li>
              <li class="d-flex justify-content-between align-items-center "><span class="mr-2">Shipping:</span><span class="text-right shipping_price" id="shipping_cost">-</span>
              </li>

              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Taxes:</span><span class="text-right tax">{{0.13*$final}}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right">—</span></li>
            </ul>
            <h3 class="font-weight-normal text-center my-4 total">

            </h3>
            <form class="needs-validation" method="post" novalidate>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Promo code" required>
                <div class="invalid-feedback">Please provide promo code.</div>
              </div>
              <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
            </form>
          </div>
        </aside>
              @endif
      </div>
      <!-- Navigation (mobile)-->
      <div class="row d-lg-none">
        <div class="col-lg-8">
          <div class="d-flex pt-4 mt-3">
            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{route('cart-item')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="{{route('shipping-page')}}"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
          </div>
        </div>
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
    <script type="text/javascript">

        $('#city').on('change', function() {
            // alert( this.value );

           let shipping= $('.shipping_price').html(this.value);
            let shipping_cost=parseFloat(this.value);
            let tax=parseFloat($('.tax').html());
            let subtotal=parseFloat($('.subtotal').html());

            let total=(subtotal+tax +shipping_cost);

            $('.total').html(total);

        });


        $('#payment_page').click(function () {
            let myform = document.getElementById('address_form');
            let formData = new FormData(myform);
            let shipping= $('.shipping_price').text();
            var shipping_id = $("#city option:selected").attr("id");
            var product_id=$('#product_id').val();
            console.log(product_id);

            formData.append('subtotal',{{$final}});
            formData.append('tax',{{0.13*$final}});
            formData.append('shipping',shipping);
            formData.append('shipping_id',shipping_id);
            formData.append('user_id',{{\Illuminate\Support\Facades\Auth::user()->id}});


            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('checkout-address')}}',
                data:formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    console.log(response.route);
                    if (response.status == 'success') {
                        toastr.success(response.message);
                    }
                    window.location=response.route;

                },
                error: function (data) {//if an error occurs
                    if (data.status == 406) {
                        jQuery.each(data.responseJSON.errors, function (key, value) {
                            toastr.error(value);

                        });
                    }
                }
            });

        });
    </script>

@endpush
