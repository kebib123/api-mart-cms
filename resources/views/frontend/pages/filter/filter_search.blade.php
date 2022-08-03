@foreach($products_filter as $value)
    <div class="col-md-4 col-sm-6 px-2 mb-4">
        <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{route('product-details',$value->slug)}}">
                <img src="{{asset('images/products/'.$value->images->where('is_main','=',1)->first()->image)}}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">{{$value->categories->first()->name}}</a>
                <h3 class="product-title font-size-sm"><a href="{{route('product-details',$value->slug)}}">{{$value->product_name}}</a></h3>
                <div class="d-flex justify-content-between">
                    <div class="product-price">Rs.<span class="text-accent">{{$value->price}}.<small>00</small></span></div>
                    <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                    </div>
                </div>
            </div>
            {{--                <div class="card-body card-body-hidden">--}}
            {{--                  <div class="text-center pb-2">--}}
            {{--                    <div class="custom-control custom-option custom-control-inline mb-2">--}}
            {{--                      <input class="custom-control-input" type="radio" name="size1" id="s-75">--}}
            {{--                      <label class="custom-option-label" for="s-75">7.5</label>--}}
            {{--                    </div>--}}
            {{--                    <div class="custom-control custom-option custom-control-inline mb-2">--}}
            {{--                      <input class="custom-control-input" type="radio" name="size1" id="s-80" checked>--}}
            {{--                      <label class="custom-option-label" for="s-80">8</label>--}}
            {{--                    </div>--}}
            {{--                    <div class="custom-control custom-option custom-control-inline mb-2">--}}
            {{--                      <input class="custom-control-input" type="radio" name="size1" id="s-85">--}}
            {{--                      <label class="custom-option-label" for="s-85">8.5</label>--}}
            {{--                    </div>--}}
            {{--                    <div class="custom-control custom-option custom-control-inline mb-2">--}}
            {{--                      <input class="custom-control-input" type="radio" name="size1" id="s-90">--}}
            {{--                      <label class="custom-option-label" for="s-90">9</label>--}}
            {{--                    </div>--}}
            {{--                  </div>--}}
            {{--                  <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>--}}
            {{--                  <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>--}}
            {{--                </div>--}}
        </div>
        <hr class="d-sm-none">
    </div>
@endforeach
