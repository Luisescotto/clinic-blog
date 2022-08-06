@extends('layouts.web')
@section('meta_description', 'Pasarela de pago')
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
                                    <li class="breadcrumb-item"><a href="{{route('web.shop_grid')}}">tienda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper mt-3">
            <div class="container">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Resumen de pedido</h2>
                            <div class="billing-form-wrap">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Productos</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($products as $product)
                                                <tr>
                                                    <td><a href="{{route('web.product_details', $product->product)}}">{{$product->product->name}} <strong> × {{$product->quantity}}</strong></a></td>
                                                    <td>DOP {{number_format($product->total(),2)}}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong>DOP {{number_format($subtotal,2)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Impuestos</td>
                                                <td><strong>DOP {{number_format($shopping_cart->total_tax(),2)}}</strong></td>
                                                {{-- <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">Flat Rate: $70.00</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                                <label class="custom-control-label" for="freeshipping">Free Shipping</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td> --}}
                                            </tr>
                                            <tr>
                                                <td>Monto total</td>
                                                <td><strong>DOP {{number_format($shopping_cart->total_price(),2)}}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                            </div>
                        </div>
                    </div>
        
                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details mt-md-26 mt-sm-26">
                            <h2>Detalles de facturación</h2>
                            <div class="order-summary-content mb-sm-4">
                                
                                <form action="{{route('pay')}}" method="POST" id="paymentForm">
                                    @csrf
                                <div class="order-payment-method">

                                    @foreach ($paymentPlatforms as $paymentPlatform)
                                    <div class="single-payment-method">
                                        <div class="payment-method-name @if ($loop->first) show @endif">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="{{$paymentPlatform->name}}payment" name="paymentmethod" value="{{$paymentPlatform->id}}" class="custom-control-input" @if ($loop->first) checked @endif required/>
                                                <label class="custom-control-label" for="{{$paymentPlatform->name}}payment">{{$paymentPlatform->name}} <img src="{{$paymentPlatform->image}}" class="img-fluid paypal-card" alt="Paypal" /></label>
                                            </div>
                                        </div>


                                        @includeIf('components.' . strtolower($paymentPlatform->name) . '-collapse')

                                        
                                    </div>
                                    @endforeach

                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-14">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">He leído y acepto los <a target="_blank"
                                                href="{{route('web.terms_conditions')}}" style="color: #e6a15c">términos y condiciones</a> del sitio web.</label>
                                        </div>
                                        <button type="submit" class="check-btn sqr-btn" id="payButton">Realizar pago</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->

        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->

        @endsection

{{-- @section('scripts')
@endsection --}}