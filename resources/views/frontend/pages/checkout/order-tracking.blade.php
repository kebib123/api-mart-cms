@extends('frontend.include.master')
@section('content')


    <!-- Page Title (Dark)-->
    <div class="bg-dark py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="czi-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Order tracking</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Tracking order: <span class="h4 font-weight-normal text-light">{{$order->order_track}}</span></h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container py-5 mb-2 mb-md-3">
      <!-- Details-->
      <div class="row mb-4">
        <div class="col-sm-4 mb-2">
          <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Shipped via:</span>Courier</div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Status:</span>Processing order</div>
        </div>
        <div class="col-sm-4 mb-2">
          <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Expected date:</span>October 15, 2019</div>
        </div>
      </div>
      <!-- Progress-->
      <div class="card border-0 box-shadow-lg">
        <div class="card-body pb-2">
          <ul class="nav nav-tabs media-tabs nav-justified">
            <li class="nav-item">
              <div class="nav-link completed">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-bag"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">First step</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Order placed</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link active">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-settings"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">Second step</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Processing order</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-star"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">Third step</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Quality check</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-package"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">Fourth step</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Product dispatched</h6>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- Footer-->
      <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
        <div class="custom-control custom-checkbox mt-2 mr-3">
          <input class="custom-control-input" type="checkbox" id="notify-me"  >
{{--          <label class="custom-control-label" for="notify-me">Notify me when order is delivered</label>--}}
        </div><a class="btn btn-primary btn-sm mt-2" href="#order-details" data-toggle="modal">View Order Details</a>
      </div>
    </div>
    <!-- Order Details Modal-->
    <div class="modal fade" id="order-details">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Order No - {{$order->first()->order_track}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body pb-0">
              @foreach($details as $value)
            <!-- Item-->
            <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
              <div class="media d-block d-sm-flex text-center text-sm-left"><a class="d-inline-block mx-auto mr-sm-4" href="{{'/product-details'}}" style="width: 10rem;"><img src="{{asset('images/products/'.$value->products->images->where('is_main','=',1)->first()->image)}}" alt="Product"></a>
                <div class="media-body pt-2">
                  <h3 class="product-title font-size-base mb-2"><a href="{{'/product-details'}}">{{$value->products->product_name}}</a></h3>
                  <div class="font-size-sm"><span class="text-muted mr-2">Size:</span>{{$value->size}}</div>
                  <div class="font-size-sm"><span class="text-muted mr-2">Color:</span>{{$value->color}}</div>
                  <div class="font-size-lg text-accent pt-2">{{$value->price}}</div>
                </div>
              </div>
              <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Quantity:</div>
                  {{$value->quantity}}
              </div>
              <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Subtotal</div>{{$value->price*$value->quantity}}
              </div>
            </div>
              @endforeach

          </div>
          <!-- Footer-->
          <div class="modal-footer flex-wrap justify-content-between bg-secondary font-size-md">
            <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>{{$value->orders->subtotal}}</span></div>
            <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span><span>{{$value->orders->shippings->shipping_price}}</div>
            <div class="px-2 py-1"><span class="text-muted">Tax:&nbsp;</span><span>{{$value->orders->tax}}</span></div>
            <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span class="font-size-lg">{{$value->orders->grand_total}}</span></div>
          </div>
        </div>
      </div>
    </div>


    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100"><a class="d-table-cell cz-handheld-toolbar-item" href="account-wishlist.php"><span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span><span class="cz-handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.php"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">$265.00</span></a>
      </div>
    </div>
    @endsection
