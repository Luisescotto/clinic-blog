<div class="product-item fix {{$mb}} mb-4">
    <div class="product-thumb">
        <a href="{{route('web.product_details', $product)}}">
            <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="">
        </a>
        <div class="product-label">
            @if ($product->has_promotions())
            <span>OFERTA</span>
            
            @endif
        </div>
        <div class="product-action-link">
            <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip" data-placement="left" title="Ver"><i class="fa fa-search"></i></span> </a>
            {{-- <a href="#" data-toggle="tooltip" data-placement="left" title="Lista de deseos"><i class="fa fa-heart-o"></i></a> --}}
            {{-- <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a> --}}
            <a href="{{route('store_a_product',$product)}}" data-toggle="tooltip" data-placement="left" title="Carrito"><i class="fa fa-shopping-cart"></i></a>
        </div>
    </div>
    
    <div class="product-content">
        <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
        <div class="pricebox">
            @if ($product->has_promotions())
            <span class="regular-price">DOP {{number_format($product->discountedPrice,2)}}</span>
            <span class="regular-price ml-2"><del>{{number_format($product->sell_price,2)}}</del></span>

            @else
            <span class="regular-price">DOP {{number_format($product->sell_price,2)}}</span>
            

            
            @endif

            @include('web.products._ratings')

        </div>
        <span><a href="{{route('web.guest', $product->guest)}}" style="color: #cecece">{{$product->guest->name}}</a></span>
        
    </div>
    <hr>
</div>

@push('modal')
    @include('web._modal_quick_view')
@endpush