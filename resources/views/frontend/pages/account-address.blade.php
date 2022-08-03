@extends('frontend.include.master')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{route('index')}}"><i class="czi-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Addresses</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">My addresses</h1>
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
                            <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><img class="rounded-circle" src="{{asset('images/user.png')}}" alt="User Image"></div>
                            <div class="media-body pl-3">
                                <h3 class="font-size-base mb-0">{{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h3><span class="text-accent font-size-sm">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="font-size-sm mb-0 text-muted">Dashboard</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('user-orders')}}"><i class="czi-bag opacity-60 mr-2"></i>Orders<span class="font-size-sm text-muted ml-auto">{{count($order)}}</span></a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('wishlist')}}"><i class="czi-heart opacity-60 mr-2"></i>Wishlist<span class="font-size-sm text-muted ml-auto">{{count($wishlist)}}</span></a></li>
                        {{--              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-tickets.php"><i class="czi-help opacity-60 mr-2"></i>Support tickets<span class="font-size-sm text-muted ml-auto">1</span></a></li>--}}
                    </ul>
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="font-size-sm mb-0 text-muted">Account settings</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('user-profile')}}"><i class="czi-user opacity-60 mr-2"></i>Profile info</a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{route('user-address')}}"><i class="czi-location opacity-60 mr-2"></i>Addresses</a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('change-password')}}"><i class="czi-security-check opacity-60 mr-2"></i>Update password</a></li>

                        {{--              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-payment.php"><i class="czi-card opacity-60 mr-2"></i>Payment methods</a></li>--}}
                        <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('logout')}}"><i class="czi-sign-out opacity-60 mr-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-4">
                    <h6 class="font-size-base text-light mb-0">List of your registered addresses:</h6><a class="btn btn-primary btn-sm" href="{{route('logout')}}"><i class="czi-sign-out mr-2"></i>Sign out</a>
                </div>
                <!-- Addresses list-->
                <div class="table-responsive font-size-md">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($address as $value)
                            <tr>
                                @if($value->is_primary==1)
                                    <td class="py-3 align-middle">{{$value->address1}}, {{$value->city}} {{$value->zip_code}},{{$value->country}}<span class="align-middle badge badge-info ml-2">Primary</span></td>
                                    <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                                            <div class="czi-trash"></div></a></td>
                                @else
                                    <td class="py-3 align-middle">{{$value->address1}}, {{$value->city}} {{$value->zip_code}},{{$value->country}}</td>
                                    <td class="py-3 align-middle">
                                        <a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a>
                                        <a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                                            <div class="czi-trash"></div></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <hr class="pb-4">
                <div class="text-sm-right"><a class="btn btn-primary" href="#add-address" data-toggle="modal">Add new address</a></div>
            </section>
        </div>
    </div>

    <!-- Add New Address-->
    <form class="needs-validation modal fade" id="add-address" method="post" tabindex="-1" novalidate action="{{route('user-address')}}">
        @csrf
        @if(\Illuminate\Support\Facades\Auth::check())
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
        @endif
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new address</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address-fn">First name</label>--}}
{{--                                <input class="form-control" type="text" name="first_name" id="address-fn" required>--}}
{{--                                <div class="invalid-feedback">Please fill in you first name!</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address-ln">Last name</label>--}}
{{--                                <input class="form-control" type="text"  name="last_name" id="address-ln" required>--}}
{{--                                <div class="invalid-feedback">Please fill in you last name!</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address-company">Company</label>--}}
{{--                                <input class="form-control" name="company" type="text" id="address-company">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address-country">Country</label>--}}
{{--                                <input class="form-control" name="country" type="text" id="address-city" required>--}}
{{--                                <div class="invalid-feedback">Please select your country!</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address-city">City</label>--}}
{{--                                <input class="form-control" name="city" type="text" id="address-city" required>--}}
{{--                                <div class="invalid-feedback">Please fill in your city!</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address-line1">Address 1</label>
                                <input class="form-control" name="address1" type="text" id="address-line1" required>
                                <div class="invalid-feedback">Please fill in your address!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address-line2">Address 2</label>
                                <input class="form-control" name="address2" type="text" id="address-line2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address-zip">ZIP code</label>
                                <input class="form-control" name="zip_code" type="text" id="address-zip" required>
                                <div class="invalid-feedback">Please add your ZIP code!</div>
                            </div>
                        </div>
{{--                        <div class="col-12">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input class="custom-control-input" type="checkbox" name="is_primary" checked id="address-primary">--}}

{{--                                <label class="custom-control-label" for="address-primary">Make this address primary</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-shadow" id="add_address" type="submit">Add address</button>
                </div>
            </div>
        </div>
    </form>

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
