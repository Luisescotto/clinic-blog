@extends('layouts.web')
@section('meta_description', 'Inicio')
@section('title', $web_company->name . ': Inicio' )
@section('styles')



@endsection
@section('content')
    <!-- hero slider start -->
    <div class="hero-slider-area">
        
        <div class="slider-wrapper-area3">
            <div class="hero-slider-active hero__3 slick-dot-style hero-dot">
                {{-- <a href="{{url('http://127.0.0.1:8000/blog_detalles/podcast_innovacion_al_dia_pt1')}}">Ir</a> --}}
                @foreach ($web_company->sliders as $slider)
                <div class="single-slider d-flex align-items-center" 
                style="background-image: url({{$slider->image->url}});">
                    <div class="container">
                        <div class="slider-main-content">
                            <div class="slider-text">
                                
                                {!! $slider->body !!}
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
    <!-- hero slider end -->   

    <!-- page wrapper start -->
    <div class="main-home-wrapper">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3">
                    <div class="main-sidebar category-wrapper mb-24 mt-4 mt-md-8 mt-sm-8">

                        @include('web._featured_category')

                    </div>
                    <!-- best seller area end -->
                </div> --}}
                <div class="col-lg-12">
                    <!-- banner statistic start -->
                    {{-- <div class="banner-statistic pt-6 pb-34">
                        <div class="img-container fix img-full">
                            <a href="#">
                                <img src="galio/assets/img/banner/home3_static5.jpg" alt="">
                            </a>
                        </div>
                    </div> --}}
                    <!-- banner statistic end -->
                    <!-- category tab area start -->
                    <div class="category-tab-area mb-30">
                        <div class="category-tab">
                            <ul class="nav">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab_one">Destacados</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_two">Nuevos</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_three">En oferta</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content pb-md-20 pb-sm-20">
                        <div class="tab-pane fade show active" id="tab_one">
                            <div class="feature-category-carousel-wrapper">
                                <div class="featured-carousel-active slick-padding slick-arrow-style arrow-space">
                                    
                                    @foreach ($featured_products->take(6) as $featured_product)

                                    @include('web.products.product_item_fix',[ 
                                    'mb' => '',
                                    'product' => $featured_product])

                                    

                                        <!-- product single item start -->
                                    {{-- <div class="product-item fix">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img src="galio/assets/img/product/product-s-1.jpg" class="img-pri" alt="">
                                                <img src="galio/assets/img/product/product-s-2.jpg" class="img-sec" alt="">
                                            </a>
                                            <div class="product-label">
                                                <span>hot</span>
                                            </div>
                                            <div class="product-action-link">
                                                <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="product-details.html">vertual product 01</a></h4>
                                            <div class="pricebox">
                                                <span class="regular-price">$70.00</span>
                                                <div class="ratings">
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <div class="pro-review">
                                                        <span>1 review(s)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- product single item end -->
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab_two">
                            <div class="feature-category-carousel-wrapper">
                                <div class="featured-carousel-active slick-padding slick-arrow-style">
                                    @foreach ($new_products as $new_product)
                                    @include('web.products.product_item_fix',[ 
                                    'mb' => '',
                                    'product' => $new_product])
                                    
                                    {{-- <div class="product-item fix">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img src="galio/assets/img/product/product-f-1.jpg" class="img-pri" alt="">
                                                <img src="galio/assets/img/product/product-f-2.jpg" class="img-sec" alt="">
                                            </a>
                                            <div class="product-label">
                                                <span>hot</span>
                                            </div>
                                            <div class="product-action-link">
                                                <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="product-details.html">vertual product 01</a></h4>
                                            <div class="pricebox">
                                                <span class="regular-price">$70.00</span>
                                                <div class="ratings">
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <div class="pro-review">
                                                        <span>1 review(s)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @endforeach
                                    

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tab_three">
                            <div class="feature-category-carousel-wrapper">
                                <div class="featured-carousel-active slick-padding slick-arrow-style">
                                    @foreach ($sale_products as $sale_product)
                                        @include('web.products.product_item_fix',[ 
                                        'mb' => '',
                                        'product' => $sale_product])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- category tab area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- page wrapper end -->

    <!-- blog-testimonial-product area start -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- blog area start -->
                <div class="col-lg-4">
                    <div class="main-sidebar blog-area mb-24 mb-md-20 mb-sm-18">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Publicaciones recientes</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="blog-carousel-active">

                            @foreach ($latest_posts as $latest_post)
                            <div class="blog-item">
                                @include('web.blog._blog_item', [
                                    'post' => $latest_post,
                                    'read_more' => false
                                ])
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- blog area end -->
               
                <!-- most view area start -->
                <div class="col-lg-4">
                    <div class="mostview-wrap">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Más vistos</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="2">
                            @foreach ($most_viewed_products as $most_viewed_product)
                            

                            <div class="col">
                                @include('web.products._category_item',[
                                    'product' => $most_viewed_product
                                ])
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- most view area end -->

                <!-- hot sale area start -->
                <div class="col-lg-4">
                    <div class="hotsale-wrap mt-md-22 mt-sm-22">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Más vendidos</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="2">
                            
                            @foreach ($products_offer as $product_offer)
                                <div class="col">
                                    @include('web.products._category_item',[
                                        'product' => $product_offer
                                    ])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- hot sale area end -->
            </div>
        </div>
    </div>
    <!-- blog-testimonial-product area end -->

    <div class="latest-product pt-md-30 pt-lg-30 pt-sm-30 mt-30" style="margin-top:20px;">
        <div class="container">
            <div class="section-title mb-30">
                <h3>Agregados recientemente</h3>
            </div> 
            <div class="latest-product-active slick-padding slick-arrow-style">
                @foreach ($new_products as $new_product)

                @include('web.products.product_item_fix',[ 
                    'mb' => '',
                    'product' => $new_product])
                @endforeach

            </div>
        </div>
    </div>

 <!-- testimonial area start -->
 <div class="col-lg-12 mt-5 mb-5 parallax newsletter">
    @include('web._testimonial_area')
</div>
<!-- testimonial area end -->

    <!-- brand area start -->
    @include('web._brand_area')
    <!-- brand area end -->

@endsection

@section('scripts')

    @if ($alert = Session::get('exito'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Te has suscrito correctamente',
        showConfirmButton: false,
        timer: 3000
        });
    </script>
    @endif
@endsection

