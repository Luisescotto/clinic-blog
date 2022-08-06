<div class="header-mini-cart">
    <div class="mini-cart-btn badge-pill">
        <i class="fa fa-shopping-cart"></i>
        @if ($shopping_cart->quantity_of_products() > 0)
            
        <span class="cart-notification">{{$shopping_cart->quantity_of_products()}}</span>

        @endif
    </div>
    <div class="cart-total-price mini-cart-btn">
        <span>total</span>
        DOP {{$shopping_cart->subtotal()}}
    </div>
    <ul class="cart-list">
        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
        <li>
            <div class="cart-img">
                <a href="{{route('web.product_details', $shopping_cart_detail->product)}}"><img src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt=""></a>
            </div>
            <div class="cart-info">
                <h4><a href="{{route('web.product_details', $shopping_cart_detail->product)}}">{{$shopping_cart_detail->product->name}}</a></h4>
            
                
                <span>
                    @if ($shopping_cart_detail->product->has_promotions())
                        DOP {{$shopping_cart_detail->product->discountedPrice}}
                        <del>{{$shopping_cart_detail->product->sell_price}}</del>
                    @else
                        DOP {{$shopping_cart_detail->product->sell_price}}
                    @endif
                </span>

            </div>
            <div class="del-icon">
                <a href="{{route('shopping_cart_details.destroy', $shopping_cart_detail)}}"><i class="fa fa-times"></i></a>
            </div>
        </li>
        @endforeach
        
        {{-- <li>
            <div class="cart-img">
                <a href="product-details.html"><img src="galio/assets/img/cart/cart-2.jpg" alt=""></a>
            </div>
            <div class="cart-info">
                <h4><a href="product-details.html">virtual product 10</a></h4>
                <span>$50.00</span>
            </div>
            <div class="del-icon">
                <i class="fa fa-times"></i>
            </div>
        </li> --}}

        <li class="mini-cart-price">
            <span class="subtotal">subtotal : </span>
            <span class="subtotal-price">DOP {{$shopping_cart->subtotal()}}</span>
        </li>
        @if ($shopping_cart->has_products())
        <div class="row">
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.checkout')}}">checkout</a>
                </li>
                
            </div>
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.cart')}}">mi carrito</a>
                </li>
            </div>
            @endif
        </div>
        
    </ul>
</div>