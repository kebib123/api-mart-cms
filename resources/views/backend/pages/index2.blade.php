
@extends('backend.layouts.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count($category)}}</h3>

                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        <a href="{{route('add-category')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count($order)}}</h3>

                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-bag"></i>
                        </div>
                        <a href="{{route('view-orders')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{count($product)}}</h3>

                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-icons"></i>
                        </div>
                        <a href="{{route('all-product')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{count($brand)}}</h3>

                            <p>Brands</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa fa-user"></i>
                        </div>
                        <a href="{{route('add-brand')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Monthly Recap Report</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
{{--                                    <div class="dropdown-menu dropdown-menu-right" role="menu">--}}
{{--                                        <a href="#" class="dropdown-item">Action</a>--}}
{{--                                        <a href="#" class="dropdown-item">Another action</a>--}}
{{--                                        <a href="#" class="dropdown-item">Something else here</a>--}}
{{--                                        <a class="dropdown-divider"></a>--}}
{{--                                        <a href="#" class="dropdown-item">Separated link</a>--}}
{{--                                    </div>--}}
                                </div>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" height="500" style="height: 180px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group">
                                        Add Products to Cart
                                        <span class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group">
                                        Complete Purchase
                                        <span class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Send Inquiries
                                        <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">$35,210.43</h5>
                                        <span class="description-text">TOTAL REVENUE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL COST</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">$24,813.53</h5>
                                        <span class="description-text">TOTAL PROFIT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                        <h5 class="description-header">1200</h5>
                                        <span class="description-text">GOAL COMPLETIONS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">

                    <div class="row">


                        <div class="col-md-6">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Members</h3>

                                    <div class="card-tools">
                                        <span class="badge badge-danger">{{count($user)}} New Members</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        @foreach($user as $value)
                                        <li>
                                            <img src="{{asset('images/user.png')}}" width="50px" alt="User Image">
                                            <a class="users-list-name" href="#">{{$value->first_name}} {{$value->last_name}}</a>
                                            <span class="users-list-date">Today</span>
                                            <small><b>{{$value->roles}}</b></small>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <a href="javascript::">View All Users</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!-- PRODUCT LIST -->
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Added Products</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @if($recent_product->isNotEmpty())
                                    @foreach($recent_product->take(3) as $value)
                                    <li class="item">
                                        <div class="product-img">
                                            @if($value->images->isNotEmpty())
                                            <img src="{{asset('/images/products/'.$img->get_main_image($value->id))}}" alt="Product Image" class="img-size-50">
                                        @endif
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">{{$value->product_name}}
                                                <span class="badge badge-warning float-right">{{$value->price}}</span></a>
                                            <span class="product-description">
                        {!! $value->short_description !!}
                      </span>
                                        </div>
                                    </li>
                                    @endforeach
                                        @endif
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{route('all-product')}}" class="uppercase">View All Products</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        </div>
                        <!-- /.card -->
                        <!-- /.col -->
                    </div>
                </div>
                    <!-- /.row -->

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                        <th>Order Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($order->isNotEmpty())
                                    @foreach($order->take(5) as $value)
                                    <tr>
                                        <td><a href="{{route('order-details',$value->id)}}">{{$value->order_track}}</a></td>

                                        <td>
                                            @if($value->status==0)
                                            <span class="badge badge-dark">Pending</span>
                                            @endif
                                            @if($value->status==1)
                                            <span class="badge badge-success">Completed</span>
                                                @endif
                                            @if($value->status==2)
                                            <span class="badge badge-warning">Cancel</span>
                                                @endif
                                                @if($value->status==3)
                                            <span class="badge badge-warning">Return</span>
                                                @endif
                                        </td>

                                        <td>
                                            {{$value->users->first_name}} {{$value->users->last_name}}
                                        </td>
                                        <td>
                                            {{$value->created_at->format('M d Y')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
{{--                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="{{route('view-orders')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

{{--                <div class="col-md-4">--}}
{{--                    <!-- Info Boxes Style 2 -->--}}
{{--                    <div class="info-box mb-3 bg-warning">--}}
{{--                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <span class="info-box-text">Inventory</span>--}}
{{--                            <span class="info-box-number">5,200</span>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box -->--}}
{{--                    <div class="info-box mb-3 bg-success">--}}
{{--                        <span class="info-box-icon"><i class="far fa-heart"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <span class="info-box-text">Mentions</span>--}}
{{--                            <span class="info-box-number">92,050</span>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box -->--}}
{{--                    <div class="info-box mb-3 bg-danger">--}}
{{--                        <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <span class="info-box-text">Downloads</span>--}}
{{--                            <span class="info-box-number">114,381</span>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}





{{--                </div>--}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    @stop
