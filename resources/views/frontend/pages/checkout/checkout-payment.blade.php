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
          <!-- Payment methods accordion-->
          <h2 class="h6 pb-3 mb-2">Choose payment method</h2>
            <!-- Fill tabs -->
            <ul class="nav nav-tabs no-border  nav-fill mb-0" role="tablist">
{{--                @foreach($payment as $value)--}}
{{--                <li class="nav-item text-center box-shadow-sm">--}}
{{--                    <a href="#{{$value->name}}" class="nav-link" data-toggle="tab" role="tab">--}}
{{--                        <div>--}}
{{--                            <img src="{{asset('images/payments/'.$value->image)}}">--}}
{{--                        </div>--}}
{{--                       {{$value->name}}</a>--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--                    <li class="nav-item text-center box-shadow-sm">--}}
{{--                        <a href="#one" class="nav-link" data-toggle="tab" role="tab">--}}
{{--                            <div>--}}
{{--                                <img src="img/credit-card.png">--}}
{{--                            </div>--}}
{{--                            Pay with Credit Card</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item text-center box-shadow-sm">--}}

{{--                        <a href="#two" class="nav-link" data-toggle="tab" role="tab">--}}
{{--                            <div>--}}
{{--                                <img src="img/esewa.png" width="32">--}}
{{--                            </div>--}}
{{--                            eSewa Mobile Wallet</a>--}}
{{--                    </li>--}}

                    <li class="nav-item text-center box-shadow-sm">

                        <a href="#three" class="nav-link" data-toggle="tab" role="tab">
                            <div>
                                <img src="img/cash.png">
                            </div>
                            Cash On Delivery
                        </a>
                        <a href="#four" id="payment-button" class="nav-link" data-toggle="tab" role="tab">
                            <div>
                                <img src="img/khalti.png" style="width: 75px">
                            </div>
                            Pay with Khalti
                        </a>

                    </li>
            </ul>

            <!-- Tabs content -->
            <div class="tab-content box-shadow">

                <div class="tab-pane fade p-4" id="one" role="tabpanel">
                    <form class="interactive-credit-card row">
                        <div class="form-group col-sm-12">
                            <p class="font-size-sm">We accept following credit cards:<br><br><img class="d-inline-block align-middle" src="img/cards.png" style="width: 187px;" alt="Cerdit Cards"></p>
                        </div>
                        <!--  <div class="form-group col-sm-6">
                            <div class="card-wrapper"></div>
                          </div>
                           <div class="col-lg-12"></div> -->
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="text" name="number" placeholder="Card Number" required>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="text" name="expiry" placeholder="MM/YY" required>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="text" name="cvc" placeholder="CVC" required>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="form-group col-sm-12">
                            <label>
                                <input class="f " type="checkbox" name="checkbox" required> Save Card
                                <small>Information is encrypted and securely stored. </small>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary btn-block mt-0" href="checkout-complete.php">Pay Now</a>
                        </div>
                    </form>
                </div>


                <div class="tab-pane fade p-4" id="two" role="tabpanel">
                    <form class=" row">
                        <div class="form-group col-sm-12">
                            <p>You will be redirected to your eSewa account to complete your payment:</p>
                            <ol>
                                <li>Login to your eSewa account using your eSewa ID and your Password</li>
                                <li>Ensure your eSewa account is active and has sufficient balance</li>
                                <li>Enter OTP (one time password) sent to your registered mobile number</li>
                            </ol>
                            <p>***Login with your eSewa mobile and PASSWORD (not MPin)***</p>
                            <a class="btn btn-primary  mt-0"href="checkout-complete.php">Pay Now</a>
                        </div>
                    </form>
                </div>


                <div class="tab-pane fade p-4" id="three" role="tabpanel">
                    <form class=" row">
                        <div class="form-group col-sm-12">
                            <p>You can pay in cash to our courier when you receive the goods at your doorstep.
                            </p>

{{--                            <a class="btn btn-primary  mt-0" href="checkout-complete.php">Confirm Order</a>--}}
                        </div>
                    </form>
                </div>

            </div>          <!-- Navigation (desktop)-->
          <div class="d-none d-lg-flex pt-4">
{{--            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{route('shipping-page')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Shipping</span><span class="d-inline d-sm-none">Back</span></a></div>--}}
            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="{{route('checkout-review',['order_id'=>$order->id])}}"><span class="d-none d-sm-inline">Review your order</span><span class="d-inline d-sm-none">Review order</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
          </div>
        </section>
        <!-- Sidebar-->
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
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Subtotal:</span><span class="text-right">{{$order->subtotal}}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Shipping:</span><span class="text-right">{{$order->shippings->shipping_price}}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Taxes:</span><span class="text-right">{{$order->tax}}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right">—</span></li>
            </ul>
            <h3 class="font-weight-normal text-center my-4">{{$order->grand_total}}</h3>
            <form class="needs-validation" method="post" novalidate>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Promo code" required>
                <div class="invalid-feedback">Please provide promo code.</div>
              </div>
              <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
            </form>
          </div>
        </aside>
      </div>
      <!-- Navigation (mobile)-->
      <div class="row d-lg-none">
        <div class="col-lg-8">
          <div class="d-flex pt-4 mt-3">
{{--            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="checkout-shipping.php"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Shipping</span><span class="d-inline d-sm-none">Back</span></a></div>--}}
            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="checkout-review.php"><span class="d-none d-sm-inline">Review your order</span><span class="d-inline d-sm-none">Review order</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer-->
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
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_ce55db52f95a41269845d9a5a022fccd",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
        ],

        "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verfication
                console.log(payload);

                $.ajax({
                    url: '{{route('payment-verify')}}',
                    type: 'GET',
                    data:
                        {
                            amount: payload.amount,
                            token: payload.token,
                        },
                    success: function (res) {
                        alert(res.message);
                        console.log('transaction succeed');

                    },
                    error: function (error) {
                        alert(error);
                        console.log('transaction failed');

                    }
                })

                // verifyPayment(payload);
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    }

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({amount: 10000});
    }

</script>

    @endpush
