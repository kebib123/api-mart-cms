<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
{{--            <h5 class="modal-title">Order No - {{$order->first()->order_track}}</h5>--}}
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body pb-0">
        @foreach($order_details as $value)
            <!-- Item-->
                <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="media d-block d-sm-flex text-center text-sm-left"><a
                            class="d-inline-block mx-auto mr-sm-4" href="{{'/product-details'}}"
                            style="width: 10rem;"><img
                                src="{{asset('images/products/'.$value->products->images->where('is_main','=',1)->first()->image)}}"
                                alt="Product"></a>
                        <div class="media-body pt-2">
                            <h3 class="product-title font-size-base mb-2"><a
                                    href="{{'/product-details'}}">{{$value->products->product_name}}</a></h3>
                            <div class="font-size-sm"><span class="text-muted mr-2">Size:</span>{{$value->size}}
                            </div>
                            <div class="font-size-sm"><span
                                    class="text-muted mr-2">Color:</span>{{$value->color}}</div>
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
            <div class="px-2 py-1"><span
                    class="text-muted">Subtotal:&nbsp;</span><span>{{$value->orders->subtotal}}</span></div>
            <div class="px-2 py-1"><span
                    class="text-muted">Shipping:&nbsp;</span><span>{{$value->orders->shippings->shipping_price}}
            </div>
            <div class="px-2 py-1"><span
                    class="text-muted">Tax:&nbsp;</span><span>{{$value->orders->tax}}</span></div>
            <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span
                    class="font-size-lg">{{$value->orders->grand_total}}</span></div>
        </div>
    </div>
</div>
