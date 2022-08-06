<div class="product-details-inner">
    <div class="row">
        <div class="col-lg-{{$col_1}}">
            <div class="product-large mb-20 slick-arrow-style_2">

                <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="">

                {{-- @foreach ($product->images as $image)
                
                <div class="pro-large-img" id="img1">
                    <img src="{{$image->url}}" alt="{{$product->name}}"/>
                </div>

                @endforeach --}}
                
                
            </div>
            {{-- <div class="pro-nav slick-padding2 slick-arrow-style_2">
                @foreach ($product->images as $image)

                <div class="pro-nav-thumb"><img src="{{$image->url}}" alt="{{$product->name}}" /></div>

                @endforeach

            </div> --}}
        </div>
        <div class="col-lg-{{$col_2}}">
            <div class="product-details-des mt-md-34 mt-sm-34">
                <h3><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h3>
                @include('web.products._ratings')

                <div class="customer-rev">
                    @guest
                    <a class="check-btn sqr-btn" href="{{route('web.login_error')}}" style="color: #ffffff; font-weight: bold;"> <i class="fa fa-user"></i>Escribir comentario</a>
                    @else
                    <a href="#" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i> Escribir comentario</a>
                    @endguest
                </div>

                <div class="availability mt-10">
                    <h5>Disponible:</h5>
                    <span>{{$product->stock}} entradas.</span>
                </div>
                <div class="pricebox">
                    <span class="regular-price">{{$product->sell_price}}</span>
                </div>
                <p>{{$product->short_description}}</p>
                
                @include('web._add_to_the_shopping_cart_form', ['class'=>''])

                {{-- <div class="useful-links mt-20">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i>compare</a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o"></i>wishlist</a>
                </div> --}}
                @if ($share)
                    <div class="share-icon mt-20">
                        <a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}&title={{$product->name}}"><i class="fa fa-facebook"></i>compartir</a>
                        <a target="_blank" class="twitter" href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$product->name}}&via={{config('app.name', 'Laravel')}}&hashtags={{config('app.name', 'Laravel')}}"><i class="fa fa-twitter"></i>tweet</a>
                        <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/link/?url={{request()->fullUrl()}}"><i class="fa fa-pinterest"></i>save</a>
                        <a target="_blank" class="google" href="https://api.whatsapp.com/send?phone={{$web_company->phone}}&text={{$product->name}}%20{{request()->fullUrl()}}"><i class="fa fa-whatsapp"></i>share</a>
                    </div>
                @endif
                
                
            </div>
        </div>
    </div>
</div>