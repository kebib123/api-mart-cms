<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" target="_blank" class="brand-link" style="background-color: #ffffff;">
        <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;"><br>
        <!--<span class="brand-text font-weight-light"> {{ config('app.name') }}</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php /*?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>
        <?php */?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-header">PRODUCTS</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-safari"></i>
                        <p>
                            Product Attributes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-size')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-brand')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-color')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Color</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-area-chart"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-category')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all-product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{url('admin/banner')}}" class="nav-link">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Banners
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>
{{--                <li class="nav-header">USERS</li>--}}
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-user"></i>--}}
{{--                        <p>--}}
{{--                            Wholesale Users--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('wholesale-user')}}" class="nav-link">--}}
{{--                                <i class="fa fa-paper-plane"></i>--}}
{{--                                <p>Add User</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


                <li class="nav-header">ORDERS</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-money"></i>
                        <p>
                           Payment Methods
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('payment.method')}}" class="nav-link">
                                <i class="fa fa-paper-plane"></i>
                                <p>Payment Methods</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Shipping Rates
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-location')}}" class="nav-link">
                                <i class="fa fa-paper-plane"></i>
                                <p>Add Shipping Location</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-country')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Country</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-city')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add City</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('view-orders')}}" class="nav-link">
                                <i class="fa fa-paper-plane"></i>
                                <p>All Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">MISCELLANEOUS</li>

                <li class="nav-item">
                    <a href="{{route('faq')}}" class="nav-link">
                        <i class="fa fa-question"></i>
                        <p>FAQ'S</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setting-page')}}" class="nav-link">
                        <i class="fa fa-wrench"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-password')}}" class="nav-link">
                        <i class="fa fa-key"></i>
                        <p>Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="fa fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
