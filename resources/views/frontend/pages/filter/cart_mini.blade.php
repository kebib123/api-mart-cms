<div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle cart-count" href="{{route('cart-item')}}"><span class="navbar-tool-label">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span><i class="navbar-tool-icon czi-cart"></i></a><a class="navbar-tool-text" href="shop-cart.php"><small>My Cart</small>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</a>
    <!-- Cart dropdown-->
    <div class="dropdown-menu dropdown-menu-right cart-replace" style="width: 20rem;">
        <div class="widget widget-cart px-3 pt-2 pb-3">
            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $value)
                    <div class="widget-cart-item pb-2 border-bottom">
                        <a class="close text-danger" type="button" href="{{route('cart-remove',$value->rowId)}}" aria-label="Remove"><span aria-hidden="true">&times;</span></a>
                        <div class="media align-items-center"><a class="d-block mr-2" href="{{route('product-details',$value->options->slug)}}"><img width="64" src="{{url('images/products/'.$value->options->image)}}" alt="Product"/></a>
                            <div class="media-body">
                                <h6 class="widget-product-title"><a href="{{route('product-details',$value->options->slug)}}">{{$value->name}}</a></h6>
                                <div class="widget-product-meta"><span class="text-accent mr-2">{{$value->price}}.<small>00</small></span><span class="text-muted">x {{$value->qty}}</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                <div class="font-size-sm mr-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent font-size-base ml-1">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}.<small>00</small></span></div><a class="btn btn-outline-secondary btn-sm" href="{{route('cart-item')}}">Expand cart<i class="czi-arrow-right ml-1 mr-n1"></i></a>
            </div><a class="btn btn-primary btn-sm btn-block" href="{{route('checkout-address')}}"><i class="czi-card mr-2 font-size-base align-middle"></i>Checkout</a>
        </div>
    </div>
</div>
