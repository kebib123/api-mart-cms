@extends('frontend.include.master')
@section('content')
    <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
      <div class="row justify-content-center">
        <div class="col-md-6  ">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">Sign in</h2>
              <div class="py-3">
                <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">With social account:</h3>
                <div class="d-inline-block align-middle">
                    <a class="social-btn sb-google mr-2 mb-2" href="/redirect/google" data-toggle="tooltip" title="Sign in with Google"><i class="czi-google"></i></a>
                    <a class="social-btn sb-facebook mr-2 mb-2" href="/redirect/facebook" data-toggle="tooltip" title="Sign in with Facebook"><i class="czi-facebook"></i></a>
{{--                    <a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Twitter"><i class="czi-twitter"></i></a></div>--}}
              </div>
              <hr>
              <h3 class="font-size-base pt-4 pb-2">Or using form below</h3>
              <form class="needs-validation" novalidate method="post" action="{{route('login')}}">
                  @csrf
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-mail"></i></span></div>
                  <input class="form-control prepended-form-control" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" name="password" type="password" placeholder="Password" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember_me">
                    <label class="custom-control-label" for="remember_me">Remember me</label>
                  </div>
                  <!--<a class="nav-link-inline font-size-sm" href="account-password-recovery.php">Forgot password?</a>-->
                </div>
                <hr class="mt-4">
                <div class="text-right pt-4">
                  <button class="btn btn-primary" type="submit"><i class="czi-sign-in mr-2 ml-n21"></i>Sign In</button>
                </div>
              </form>
            </div>
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
