{!! Form::open(['route' =>[ 'shopping_cart_details.store', $product], 'method' => 'POST']) !!}
    <div class="quantity-cart-box d-flex align-items-center {{$class}}">
        <div class="quantity">
            <div class=""><input type="number" name="quantity" value="1" min="1" max="{{$product->stock}}" onKeyDown="return false"></div>
        </div>
        <div class="action_link">
            <button class="buy-btn" type="submit" style="border: none; padding: 0;">al carrito<i class="fa fa-shopping-cart"></i> </button>
        </div>
    </div>
{!! Form::close() !!}