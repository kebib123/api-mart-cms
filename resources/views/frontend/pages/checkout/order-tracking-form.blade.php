@extends('frontend.include.master')
@section('content')
    <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">Track a Order</h2>
              <div class="py-2">
            <hr>
              </div>


              <form class="needs-validation" novalidate>
                 <div class="form-group">
                  <label for="order-id">Order Id</label>
                  <input class="form-control" type="text" required id="order-id">
                  <div class="invalid-feedback">Please enter your Order Id!</div>
                </div>

                <div class="form-group">
                  <label for="order-email">Email ID</label>
                  <input class="form-control" type="email" required id="order-email">
                  <div class="invalid-feedback">Please enter your Email Id!</div>
                </div>


                <hr class="mt-4">
                <div class="text-right pt-4">
                  <a class="btn btn-primary" href="{{route('track-order')}}"><i class="czi-location mr-2 ml-n21"></i>Track Your Order</a>
                </div>
              </form>
            </div>
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
