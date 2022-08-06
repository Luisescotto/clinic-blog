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
                                    <li class="breadcrumb-item active" aria-current="page">Sobre nosotros</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- about wrapper start -->
        <div class="about-us-wrapper pt-4">
            <div class="container">
                <div class="row">
                    <!-- About Text Start -->
                    <div class="col-lg-6">
                        <div class="about-text-wrap">
                            <h2><span>Proporcionamos lo mejor</span>Para ti</h2>
                            <p>Somos la mejor tienda en venta de entradas para seminarios, queremos generar un impacto social positivo. Puedes adquirir tus entradas sin ningún tipo de molestia.</p>
                            <p>Nuestros clientes confían en nosotros y adquieren sus entradas sin ningún tipo de hostigamiento porque nos creen y siempre están felices de comprar con nosotros.</p>
                            <p>Brindamos la mejor confianza.</p>
                        </div>
                    </div>
                    <!-- About Text End -->
                    <!-- About Image Start -->
                    <div class="col-lg-5 ml-auto">
                        <div class="about-image-wrap mt-md-26 mt-sm-26">
                            <img src="galio/assets/img/about/about.jpg" alt="About" />
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>
            </div>
        </div>
        <!-- about wrapper end -->

        <!-- team area start -->
        <div class="team-area pt-28">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-box text-center mb-10">
                            <h3>Nuestro Equipo</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30">
                            <div class="team-thumb img-full">
                                <img src="galio/assets/img/team/team_member_1.jpg" alt="">
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>Johanna Scott</h3>
                                <h6>CEO</h6>
                                {{-- <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p> --}}
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30">
                            <div class="team-thumb img-full">
                                <img src="galio/assets/img/team/team_member_2.jpg" alt="">
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>oliver bastin</h3>
                                <h6>Diseñador</h6>
                                {{-- <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p> --}}
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30">
                            <div class="team-thumb img-full">
                                <img src="galio/assets/img/team/team_member_3.jpg" alt="">
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>erika jonson</h3>
                                <h6>Desarrolladora</h6>
                                {{-- <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p> --}}
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30">
                            <div class="team-thumb img-full">
                                <img src="galio/assets/img/team/team_member_4.jpg" alt="">
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>maria mandy</h3>
                                <h6>director de marketing</h6>
                                {{-- <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p> --}}
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                </div>
            </div>
        </div>
        <!-- team area end -->

        <!-- testimonial area start -->
        {{-- <div class="testimonial-area2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-title text-center mb-28">
                            <h3>happy customer</h3>
                        </div> <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel-active testimonial-style-2 slick-dot-style">
                            <div class="testimonial-item text-center">
                                <div class="testimonial-thumb">
                                    <img src="galio/assets/img/testimonial/team_member1.jpg" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                                    <h3><a href="#">Elizabeth Taylor</a></h3>
                                </div>
                            </div> <!-- end single testimonial item -->
                            <div class="testimonial-item text-center">
                                <div class="testimonial-thumb">
                                    <img src="galio/assets/img/testimonial/team_member2.jpg" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                                    <h3><a href="#">Elizabeth Taylor</a></h3>
                                </div>
                            </div> <!-- end single testimonial item -->
                            <div class="testimonial-item text-center">
                                <div class="testimonial-thumb">
                                    <img src="galio/assets/img/testimonial/team_member3.jpg" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                                    <h3><a href="#">Elizabeth Taylor</a></h3>
                                </div>
                            </div> <!-- end single testimonial item -->
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- testimonial area end -->

        <!-- choosing area start -->
        {{-- <div class="choosing-area pt-28">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-box text-center mb-30">
                            <h3>why choose us</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-globe"></i>
                            <h4>free shipping</h4>
                            <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-plane"></i>
                            <h4>fast delivery</h4>
                            <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-comments"></i>
                            <h4>customers support</h4>
                            <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- choosing area end -->

        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->

        @endsection

@section('scripts')
@endsection