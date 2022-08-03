
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
                    <i class="fa fa-globe"></i> Order ID#{{$order->order_track}}
                    <small style="text-align: right">Ordered Date:{{$order->created_at}} </small>
                </h2>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <section>
                    <!-- title row -->

                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <h4> Customer Info:</h4>
                            <address>
                                <strong>{{$order->users->first_name}} {{$order->users->last_name}}</strong><br>
                                <i class="fa fa-phone"></i>{{$order->users->phone}}<br>
                                <i class="fa fa-envelope"></i>{{$order->users->email}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <h4> ShippingInfo</h4>
                            <address>
                                <strong>{{$order->addresses->first()->first_name}} {{$order->addresses->first()->last_name}}</strong>
                                <br>
                                <i class="fa fa-location-arrow"></i>  {{$order->addresses->first()->address1}}, {{$order->shippings->shipping_location}}
                                <br>
                                <i class="fa fa-phone"></i>  <strong>Phone: </strong>{{$order->addresses->first()->phone}}<br>
                                <i class="fa fa-cash-register"></i><strong> ShippingMethod:</strong> Cash On Delivery <br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <h4>Billing Info</h4>
                            <address>
                                <strong>{{$order->addresses->first()->first_name}}  {{$order->addresses->first()->last_name}}</strong><br>
                                <i class="fa fa-location-arrow"></i>{{$order->addresses->first()->address1}},{{$order->shippings->shipping_location}}<br>
                                <i class="fa fa-phone"></i>  <strong>Phone: </strong>{{$order->addresses->first()->phone}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                    <!-- /.row -->
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table id="example" class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detail as $key=> $value)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$value->products->product_name}}</td>
                                        <td>{{$value->quantity}}</td>
                                        <td>      @if($value->color != '')
                                                <div class="foo blue"
                                                     style="  background: {{$value->color}}; float: left;width: 20px; height: 20px;margin: 5px;border: 1px solid rgba(0, 0, 0, .2);
                                                         "></div>
                                            @else
                                                null
                                            @endif
                                        </td>
                                        <td>{{$value->size != '' ? $value->size : "Free Size"}}</td>
                                        <td>{{$value->price}}</td>
                                        <td class="price">{{$value->total}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->

                    </div>
                    <hr>
                </section>

                <div class="col-md-6">
                    <!--<p class="lead"></p>-->

                    <div class="table-responsive ">
                        <table id="info" class="table order-table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td class="sub">{{$order->subtotal}}</td>
                            </tr>
                            <tr>
                                <th>Tax:</th>
                                <td class="vat">{{$order->tax}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Cost:</th>
                                <td class="charge">{{$order->shippings->shipping_price}}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td class="grand">{{$order->grand_total}}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

