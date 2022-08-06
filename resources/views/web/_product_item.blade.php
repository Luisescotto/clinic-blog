<div class="col-lg-4 col-md-4 col-sm-6">
                            <!-- product single grid item start -->
                            
                            @include('web.products.product_item_fix', ['mb' => 'mb-30'])
                            <!-- product single grid item end -->
                            <!-- product single list item start -->
                            <div class="product-list-item mb-30">
                                <div class="product-thumb">
                                    <a href="{{route('web.product_details', $product)}}">
                                        <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="">
                                    </a>
                                    <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                </div>
                                <div class="product-list-content">
                                    <h3><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h3>
                                    
                                    @include('web.products._ratings')

                                    <div class="pricebox">
                                        <span class="regular-price">DOP {{$product->sell_price}}</span>

                                        @if ($product->has_promotions())

                                            <span class="old-price"><del>{{$product->discountedprice}}</del></span>

                                        @endif

                                    </div>
                                    <p>{{$product->short_description}}</p>
                                    {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                    <p>Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p> --}}
                                    <div class="product-list-action-link">
                                        
                                        <a class="buy-btn" href="{{route('store_a_product',$product)}}" data-toggle="tooltip" data-placement="top" title="Agregar al carrito">Agregar<i class="fa fa-shopping-cart"></i> </a>
                                        
                                        <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Lista de deseos"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- product single list item start -->
                        </div> <!-- product single column end -->

                        @include('web._modal_quick_view')