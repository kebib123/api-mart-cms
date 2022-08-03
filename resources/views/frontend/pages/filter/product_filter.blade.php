<div class="row pt-4 mx-n2">

@if($products->count()==0)
        <span class="center">No Products To Show.</span>
    @endif
    @if($products->isNotEmpty())
        @foreach($products as $value)
            <input type="hidden" id="product_id" value="{{$value->id}}">
            <div class="col-md-4 col-sm-6 px-2 mb-4">
                <div class="card product-card">
                    <a class="btn-wishlist btn-sm" href="{{route('add-wishlist',$value->id)}}"
                       type="button" data-toggle="tooltip" data-placement="left"
                       title="Add to wishlist"><i class="czi-heart"></i></a>
                    @if($value->images->isNotEmpty())
                        <a class="card-img-top d-block overflow-hidden"
                           href="{{route('product-details',$value->slug)}}"><img
                                src="{{asset('images/products/'.$value->images->where('is_main','=',1)->first()->image)}}"
                                alt="Product"></a>

                    @endif
                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                                                   href="{{route('product-details',$value->slug)}}">{{$value->categories->first()->name}}</a>
                        <h3 class="product-title font-size-sm"><a
                                href="{{route('product-details',$value->slug)}}">{{$value->product_name}}</a></h3>
                        <div class="d-flex justify-content-between">
                            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->roles=='wholeseller')
                                <div class="product-price">Rs.<span class="text-accent">{{$value->wholesale_price}}.<small>00</small></span></div>
                            @else
                                <div class="product-price">Rs.<span class="text-accent">{{$value->price}}.<small>00</small></span></div>
                            @endif

                            @if($value->reviews->isNotEmpty())
                                @foreach($value->reviews as $value1)
                                    <div class="star-rating">
                                        @for ($i=0; $i<$value1->rating; $i++)
                                            <i class="sr-star czi-star-filled active [$i]"></i>
                                        @endfor
                                    </div>
                                @endforeach
                            @else
                                <div class="star-rating">
                                    <i class="sr-star czi-star-filled"></i>
                                    <i class="sr-star czi-star-filled"></i>
                                    <i class="sr-star czi-star-filled"></i>
                                    <i class="sr-star czi-star-filled"></i>
                                    <i class="sr-star czi-star-filled"></i>
                                </div>
                            @endif                  </div>
                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
        @endforeach
    @endif

</div>


@push('scripts')
    <script>
        // filter
        $(document).ready(function () {

            $('.item_sort').change(function (e) {
                var val = $(this).find(':checked').val();
                console.log(val);

                $.ajax({
                    url: document.URL,
                    type: 'get',
                    data: {
                        value: val,
                    },
                    success: function (result) {
                        console.log(result);

                        $('.product_filter_result').replaceWith($('.product_filter_result')).html(result);
                    }
                });

            })

            //

        });
    </script>
@endpush
