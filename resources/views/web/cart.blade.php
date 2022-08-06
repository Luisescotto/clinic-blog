@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')



@endsection
@section('content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.welcome')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{route('web.shop_grid')}}">Tienda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mi Carrito</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- cart main wrapper start -->
<div class="cart-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                {!! Form::open(['route' => 'shopping_cart.update' , 'method' => 'PUT']) !!}
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Miniatura</th>
                            <th class="pro-title">Producto</th>
                            <th class="pro-price">Precio</th>
                            <th class="pro-quantity">Cantidad</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                            
                        
                        <tr>
                            <td class="pro-thumbnail"><a href="{{route('web.product_details', $shopping_cart_detail->product)}}"><img class="img-fluid" src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt="Product"/></a></td>
                            <td class="pro-title"><a href="{{route('web.product_details', $shopping_cart_detail->product)}}">{{$shopping_cart_detail->product->name}}</a></td>
                            <td class="pro-price"><span>DOP {{$shopping_cart_detail->product->discountedPrice}}</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" name="quantity[]" value="{{$shopping_cart_detail->quantity}}"></div>
                            </td>
                            <td class="pro-subtotal"><span>{{$shopping_cart_detail->total()}}</span></td>
                            <td class="pro-remove"><a href="{{route('shopping_cart_details.destroy', $shopping_cart_detail)}}"><i class="fa fa-trash-o"></i></a></td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        {{-- <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code" required />
                            <button class="sqr-btn">Apply Coupon</button>
                        </form> --}}
                    </div>
                    <div class="cart-update mt-sm-16">
                        <button type="submit" class="sqr-btn">Actualizar carrito</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Total Carrito</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>DOP {{$shopping_cart->subtotal()}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr> --}}
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">DOP {{$shopping_cart->total_price()}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="{{route('web.checkout')}}" class="sqr-btn d-block">Pagar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->

@endsection

@section('scripts')
@endsection