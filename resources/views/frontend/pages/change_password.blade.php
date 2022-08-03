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
                        <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">Profile info</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0">
                <div class="cz-sidebar-static rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
                    <div class="px-4 mb-4">
                        <div class="media align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><img
                                    class="rounded-circle" src="{{asset('images/user.png')}}" alt="User Image"></div>
                            <div class="media-body pl-3">
                                <h3 class="font-size-base mb-0">{{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h3>
                                <span
                                    class="text-accent font-size-sm">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="font-size-sm mb-0 text-muted">Dashboard</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                                          href="{{route('user-orders')}}"><i
                                    class="czi-bag opacity-60 mr-2"></i>Orders<span
                                    class="font-size-sm text-muted ml-auto">{{count($order)}}</span></a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                                          href="{{route('wishlist')}}"><i
                                    class="czi-heart opacity-60 mr-2"></i>Wishlist<span
                                    class="font-size-sm text-muted ml-auto">{{count($wishlist)}}</span></a></li>
                        {{--              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-tickets.php"><i class="czi-help opacity-60 mr-2"></i>Support tickets<span class="font-size-sm text-muted ml-auto">1</span></a></li>--}}
                    </ul>
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="font-size-sm mb-0 text-muted">Account settings</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                                          href="{{route('user-profile')}}"><i
                                    class="czi-user opacity-60 mr-2"></i>Profile info</a></li>
                        <li class="border-bottom mb-0"><a
                                class="nav-link-style d-flex align-items-center px-4 py-3 active"
                                href="{{route('user-address')}}"><i
                                    class="czi-location opacity-60 mr-2"></i>Addresses</a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 "
                                                          href="{{route('change-password')}}"><i
                                    class="czi-security-check opacity-60 mr-2"></i>Update password</a></li>
                        {{--              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-payment.php"><i class="czi-card opacity-60 mr-2"></i>Payment methods</a></li>--}}
                        <li class="d-lg-none border-top mb-0"><a
                                class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('logout')}}"><i
                                    class="czi-sign-out opacity-60 mr-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">Update you password:</h6><a
                        class="btn btn-primary btn-sm" href="{{route('logout')}}"><i class="czi-sign-out mr-2"></i>Sign
                        out</a>
                </div>
                <!-- Profile form-->
                <form id="password_form">
                    {{--                    @if($auth!=null)--}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="account-pass">Old Password</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="old_password" type="password" id="account-pass">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="account-pass">New Password</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="new_password" type="password" id="account-pass">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="account-confirm-pass">Confirm Password</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="confirm_password" type="password"
                                           id="account-confirm-pass">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">

                                <button class="btn btn-primary mt-3 mt-sm-0" id="update_password" type="button">Update
                                    password
                                </button>
                            </div>
                        </div>
                    </div>


                </form>
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
        $('#update_password').on('click', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            let myform = document.getElementById('password_form');
            let formData = new FormData(myform);
            console.log(formData);

            $.ajax({
                type: 'POST',
                url: '{{route('change-password')}}',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                        toastr.success(data.success);
                },
                error: function (data) {//if an error occurs
                    if (data.status == 406) {
                        jQuery.each(data.responseJSON.errors, function (key, value) {
                            toastr.error(value);

                        });
                    }
                    if (data.status == 401) {
                        console.log(data.responseJSON.errors);
                            toastr.error(data.responseJSON.errors);

                    }

                }

            });


        });

    </script>

@endpush
