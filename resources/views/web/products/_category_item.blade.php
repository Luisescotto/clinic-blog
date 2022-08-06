<div class="category-item">
    <div class="category-thumb">
        <a href="{{route('web.product_details', $product)}}">
            <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="">
        </a>
    </div>
    <div class="category-content">
        <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
        <div class="price-box">
            @if ($product->has_promotions())
            <span class="regular-price">DOP {{number_format($product->discountedPrice,2)}}</span>
            <span class="regular-price ml-2"><del>{{number_format($product->sell_price,2)}}</del></span>

            @else
            <span class="regular-price">DOP {{number_format($product->sell_price,2)}}</span>
            
            @endif
        </div>
        @include('web.products._ratings')

    </div>
</div> <!-- end single item -->