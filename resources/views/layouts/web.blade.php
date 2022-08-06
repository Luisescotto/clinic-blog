<!DOCTYPE html>
<html class="no-js" lang="es">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">

    <!-- Site title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! asset('galio/assets/img/favicon.ico')!!}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    
    {!! Html::style('galio/assets/css/bootstrap.min.css') !!}
    <!-- Font-Awesome CSS -->
    {!! Html::style('galio/assets/css/font-awesome.min.css') !!}
    <!-- helper class css -->
    {!! Html::style('galio/assets/css/helper.min.css') !!}
    <!-- Plugins CSS -->
    {!! Html::style('galio/assets/css/plugins.css') !!}
    <!-- Main Style CSS -->
    {!! Html::style('galio/assets/css/style.css') !!}
    {{-- {!! Html::style('galio/assets/css/skin-default.css') !!} --}}

    {!! Html::style('bootstrap_star_rating/css/star-rating.css') !!}
    {{-- {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css') !!} --}}

    {{-- <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" /> --}}
 
    {{-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/js/star-rating.js" type="text/javascript"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        .tt-query{
         -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
                 box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    
        }
    
        .tt-hint{
            color: #999;
        }
    
        .tt-menu{
            width: calc(100% - 50px);
            margin-top: 4px;
            padding: 4px 0;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            -webkit-border-radius: 0px;
               -moz-border-radius: 0px;
                    border-radius: 0px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
               -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                    box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }
    
        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }
    
        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #f8f8f8;
            background-color: #d8373e;
        }
    
        .tt-suggestion p {
            margin: 0;
        }

label {
  margin-bottom: 0;
}

a:focus,
a:hover {
  color: #e6a15c;
}

.checkbox-inline+.checkbox-inline,
.radio-inline+.radio-inline {
  margin-top: 6px;
}

.relative {
  position: relative;
}
.switcher{
  margin-bottom:70px;
}
ul.switcher li{
  list-style-type: none;
  width:50%;
  position:absolute;
  top:0;
}
.first{
  left:0;
}
.second{
  right:0;
}
.login-container-wrapper {
  max-width: 400px;
  margin: 2% auto 5%;
  padding: 40px;
  box-sizing: border-box;
  /* background: rgba(57, 89, 116, 0.8); */
  background: rgb(52,62,93);
background: radial-gradient(circle, rgba(52,62,93,1) 0%, rgba(35,42,63,1) 100%);
  position: relative;
  box-shadow: 0px 5px 5px -5px #000;
  /* background-image:url('https://images.unsplash.com/photo-1567359781514-3b964e2b04d6?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ'); */
  background-size:cover;
  background-blend-mode:saturation;
}
.login-container-wrapper .logo,
.login-container-wrapper .welcome {
  font-size: 16px;
  letter-spacing: 1px;
}
.login-container-wrapper li {
  text-align: center;
  padding:0 15px;
  background-color: #283443;
  height:50px;
  line-height:50px;
  box-shadow: inset 0 -2px 0 0 #ccc;
  cursor:pointer;
}
.login-container-wrapper li a{
   color:#fff;
}
.login-container-wrapper li a:hover{
  color:#ccc;
  text-decoration:none;
}

.login-container-wrapper li a:active,
.login-container-wrapper li a:focus{
  color:#fff;
  text-decoration:none;
}
.login-container-wrapper li.active{
  background-color:transparent;
  box-shadow:none;
}
.login-container-wrapper li.active{
  border-bottom:2px solid #fff;
  padding-bottom:5px;
  margin-bottom: 20px;
}

.login input:focus + .fa{
  color:#e6a15c;
}
.login-form .form-group {
  margin-right: 0;
  margin-left: 0;
}

.login-form i {
  position: absolute;
  top: 0;
  left: 19px;
  line-height:52px;
  color: rgba(40, 52, 67, 1);
  z-index:100;
  font-size:16px;
}

.login-form .input-lg {
  font-size: 16px;
  height: 52px;
  padding: 10px 25px;
  border-radius: 0;
}

.login input[type="email"],
.login input[type="password"],
.login input[type="text"],
.login input:focus {
  background-color: rgba(40, 52, 67, 0.75);
  border: 0px solid #4a525f;
  color: #eee;
  border-left: 45px solid #93a5ab;
  border-radius:40px;
}

.login input:focus {
  border-left: 45px solid #eee;
}

input:-webkit-autofill,
textarea:-webkit-autofill,
select:-webkit-autofill {
  background-color: rgba(40, 52, 67, 0.75)!important;
  background-image: none;
  color: rgb(0, 0, 0);
  border-color: #FAFFBD;
}

.login .checkbox label,
.login .checkbox a {
  color: #ddd;
  vertical-align: top;
}
input[type="checkbox"]:checked + label::before,
.checkbox-success input[type="radio"]:checked + label::before {
    background-color: #25a08d !important;
}
.btn-success {
  background-color: #e6a15c;
  background-image: none;
  padding: 8px 50px;
  margin-top:20px;
  border-radius: 40px;
  border: 1px solid #e6a15c;
  -webkit-transition: all ease 0.8s;
  -moz-transition: all ease 0.8s;
  transition: all ease 0.8s;
}

.btn-success:focus,
.btn-success:hover,
.btn-success.active,
.btn-success.active:hover,
.btn-success:active:hover,
.btn-success:active:focus,
.btn-success:active {
  background-color: #e6a15c;
  border-color: #e6a15c;
  box-shadow: 0px 5px 5px -5px #e6a15c;
  text-shadow:0 0 8px #fff;
  color: #FFF;
  outline:none;
}  
    </style>

    @yield('styles')
    @stack('styles')
</head>

<body>

    <!-- color switcher start -->
    {{-- <div class="color-switcher">
        <div class="color-switcher-inner">
            <div class="switcher-icon">
                <i class="fa fa-cog fa-spin"></i>
            </div>

            <div class="switcher-panel-item">
                <h3>Color Schemes</h3>
                <ul class="nav flex-wrap colors">
                    <li class="default active" data-color="default" data-toggle="tooltip" data-placement="top" title="Red"></li>
                    <li class="green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green"></li>
                    <li class="soft-green" data-color="soft-green" data-toggle="tooltip" data-placement="top" title="Soft-Green"></li>
                    <li class="sky-blue" data-color="sky-blue" data-toggle="tooltip" data-placement="top" title="Sky-Blue"></li>
                    <li class="orange" data-color="orange" data-toggle="tooltip" data-placement="top" title="Orange"></li>
                    <li class="violet" data-color="violet" data-toggle="tooltip" data-placement="top" title="Violet"></li>
                </ul>
            </div>

            <div class="switcher-panel-item">
                <h3>Layout Style</h3>
                <ul class="nav layout-changer">
                    <li><button class="btn-layout-changer active" data-layout="wide">Wide</button></li>
                    <li><button class="btn-layout-changer" data-layout="boxed">Boxed</button></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Pattern</h3>
                <ul class="nav flex-wrap bgbody-style bg-pattern">
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/1.png')!!}" alt="Pettern"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/2.png')!!}" alt="Pettern"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/3.png')!!}" alt="Pettern"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/4.png')!!}" alt="Pettern"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/5.png')!!}" alt="Pettern"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-pettern/6.png')!!}" alt="Pettern"></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Image</h3>
                <ul class="nav flex-wrap bgbody-style bg-img">
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/01.jpg')!!}" alt="Images"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/02.jpg')!!}" alt="Images"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/03.jpg')!!}" alt="Images"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/04.jpg')!!}" alt="Images"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/05.jpg')!!}" alt="Images"></li>
                    <li><img src="{!! asset('galio/assets/img/bg-panel/bg-img/06.jpg')!!}" alt="Images"></li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- color switcher end -->

    <div class="wrapper box-layout">

        <!-- header area start -->
        <header>

            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    {{$web_company->email}}
                                </a>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    {{$web_company->phone}}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                        
                        @guest
                        <li>
                            <a href="#" data-toggle="modal" data-target="#quick_view_login">iniciar sesión</a>
                        </li>
                        
                        <li>
                            <a href="#" data-toggle="modal" data-target="#quick_view_register">crear cuenta</a>
                        </li>
                        
                        @else

                        <li>
                            <div class="dropdown header-top-dropdown">
                                <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    mi cuenta
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="{{ route('web.my_account') }}">mi cuenta</a>
                                    <a class="dropdown-item" href="{{ route('web.orders') }}">pedidos</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">cerrar sesión</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>

                        @endguest
                                        
                                        {{-- <li>
                                            <a href="#">my wishlist</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{route('web.cart')}}">Mi carrito</a>
                                        </li>
                                        @if ($shopping_cart->has_products())
                                        <li>
                                            <a href="{{route('web.checkout')}}">Pagos</a>
                                        </li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="{{route('web.welcome')}}">
                                    <img src="{!! asset($web_company->logo)!!}" alt="{{$web_company->name}}">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                {{-- <div class="header-middle-shipping mb-20">
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Working time</h5>
                                            <span>Mon- Sun: 8.00 - 18.00</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>free shipping</h5>
                                            <span>On order over $199</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>money back 100%</h5>
                                            <span>Within 30 Days after delivery</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                </div> --}}
                                <div class="header-middle-block">
                                    <div class="header-middle-searchbox">
                                        @include('layouts._searchbox')
                                    </div>
                                    @include('layouts._mini_cart')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">


                                @include('layouts._category_toggle_wrap')


                                @include('layouts._main_menu')

                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->

        @yield('content')

        <!-- footer area start -->
        @stack('modal')

        <footer>
            <!-- footer top start -->
            {{-- @if ($alert = Session::get('exito'))
                <div class="alert alert-success alert-dismissible fade show m-5 px-5" role="alert">
                    <strong>{{$alert}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container">
                    @if ($errors->has('subscription_email'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('subscription_email')}}
                    </div>
                    @endif

                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>Suscríbete a nuestro newsletter</h3>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form action="{{route('web.subscription_email')}}" method="POST">
                                    @csrf
                                    <input type="email" name="subscription_email" placeholder="Correo Electrónico" required>
                                    <button type="submit">Suscrbirse!</button>
                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            {{-- <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div> --}}
                            <!-- mailchimp-alerts end -->
                        </div>
                        <div class="social-icons">
                            @foreach ($web_social_networks as $web_social_network)
                                <a href="{{$web_social_network->url}}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{$web_social_network->name}}"><i class="fa {{$web_social_network->icon}}"></i></a>
                            @endforeach
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>CONTACTO</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        <li><i class="fa fa-envelope"></i>{{$web_company->email}}</li>
                                        <li><i class="fa fa-phone"></i>{{$web_company->phone}}</li>
                                        <li><i class="fa fa-map-marker"></i>Dirección: {{$web_company->address}}</li>
                                    </ul>
                                    <a class="map-btn" href="{{url($web_company->google_map_link)}}" target="_blank">Abrir en Google Map</a>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Mi cuenta</h4>
                                </div>
                                
                            <div class="widget-body">
                                 <ul>
                                @guest
                                
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#quick_view_login">iniciar sesión</a>
                                </li>
                                
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#quick_view_register">crear cuenta</a>
                                </li>
                                @else
                                     <li><a href="{{route('web.my_account')}}">Mi cuenta</a></li>
                                     
                                     @if ($shopping_cart->has_products())
                                         <li><a href="{{route('web.checkout')}}">Pagar</a></li>
                                     @endif
                                     
                                     <li><a href="{{route('web.orders')}}">Mis pedidos</a></li>
                                @endguest
                                    
                                    <li><a href="{{route('web.cart')}}">Mi carrito</a></li>
                                    
                                 </ul>
                            </div>
                                
                                
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Categorías populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @foreach ($web_categories->take(5) as $web_category)
                                            <li>
                                                <a href="{{route('web.get_products_category', $web_category)}}">{{$web_category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Etiquetas populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @foreach ($web_tags_products->take(5) as $web_tags_product)
                                            <li>
                                                <a href="{{route('web.get_products_tag', $web_tags_product)}}">{{$web_tags_product->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <div class="copyright-text" style="color: #040404">
                            Copyright &copy; 2021 Todos los derechos reservados
                        </div>
                        <div class="payment-method-img">
                            @foreach ($web_payment_methods as $web_payment_method)
                             <img src="{{$web_payment_method->image}}" alt="">
                            @endforeach                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer>
        <!-- footer area end -->

    </div>


    <!-- Quick view modal start -->
    {{-- @include('web._modal_quick_view') --}}
    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    @include('web._modal_login')
    @include('web._modal_register')



    {!! Html::script('galio/js/off-canvas.js') !!}
    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    {!! Html::script('galio/assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- Jquery Min Js -->
    {!! Html::script('galio/assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper Min Js -->
    {!! Html::script('galio/assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap Min Js -->
    {!! Html::script('galio/assets/js/vendor/bootstrap.min.js') !!}
    <!-- Plugins Js-->
    {!! Html::script('galio/assets/js/plugins.js') !!}
    <!-- Ajax Mail Js -->
    {!! Html::script('galio/assets/js/ajax-mail.js') !!}
    <!-- Active Js -->
    {!! Html::script('galio/assets/js/main.js') !!}
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    {!! Html::script('galio/assets/js/switcher.js') !!}

    {!! Html::script('js/typeahead.bundle.min.js') !!}

    {!! Html::script('bootstrap_star_rating/js/star-rating.js') !!}
    {!! Html::script('bootstrap_star_rating/js/locales/es.js') !!}
    {!! Html::script('bootstrap_star_rating/themes/krajee-fa/theme.js') !!}

    <script>
        $(document).ready(function(){
      
      $('ul.switcher li').click(function(){
        var tab_id = $(this).attr('data-tab');
    
        $('li').removeClass('active');
        $('div.tab-pane').removeClass('active');
    
        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
      })
    
    });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>


</html>