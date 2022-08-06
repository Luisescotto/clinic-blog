@extends('layouts.web')
@section('meta_description', '')
@section('title', 'Iniciar Sesión')
@section('styles')

<style>

label {
  margin-bottom: 0;
}

a:focus,
a:hover {
  color: #008080;
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
.login-container-wrapper li.active a{
  border-bottom:2px solid #fff;
  padding-bottom:5px;
}

.login input:focus + .fa{
  color:#25a08d;
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
  background-color: #25a08d;
  background-image: none;
  padding: 8px 50px;
  margin-top:20px;
  border-radius: 40px;
  border: 1px solid #25a08d;
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
  background-color: #25a08d;
  border-color: #25a08d;
  box-shadow: 0px 5px 5px -5px #25a08d;
  text-shadow:0 0 8px #fff;
  color: #FFF;
  outline:none;
}    
</style>

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
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Iniciar Sesión y Registro</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="container">
    @if (session('login_messages'))
        <div class="alert alert-danger" role="alert">
            {{session('login_messages')}}
        </div>
    @endif
</div>

{{-- @if (session('mensaje'))
<div class="alert alert-success" role="alert">
    {{session(mensaje)}}
</div>
@endif

@if ($errors->has('subscription_email'))
<div class="alert alert-danger" role="alert">
    {{$errors->first('subscription_email')}}
</div>
@endif --}}

<!-- login register wrapper start -->
<div class="login-register-wrapper">
    <div class="container">

        <div class="login">
              <div class="login-container-wrapper clearfix">
                <ul class="switcher clearfix">
                  <li class="first logo active" data-tab="login">         
                      <a>Iniciar sesión</a>      
                  </li>
                  <li class="second logo" data-tab="sign_up">
                      <a>Registro</a>  
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="login">
                    <form class="form-horizontal login-form">
                      <div class="form-group relative">
                        <input class="form-control input-lg" id="login_username" placeholder="E-mail Address" required type="email"> <i class="fa fa-user"></i>
                      </div>
                      <div class="form-group relative">
                        <input class="form-control input-lg" id="login_password" placeholder="Password" required type="password"> <i class="fa fa-lock"></i>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Iniciar sesión</button>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="stay-sign" type="checkbox">
                        <label for="stay-sign"></label>
                      </div>
                      <hr />
                      <div class="text-center">
                        <label><a href="#">¿Olvidaste tu contraseña?</a></label>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="sign_up">
                    <form class="form-horizontal login-form">
                      <div class="form-group relative">
                        <input class="form-control input-lg" id="login_username" placeholder="E-mail Address" required="" type="email"> <i class="fa fa-user"></i>
                      </div>
                      <div class="form-group relative">
                        <input class="form-control input-lg" id="login_password" placeholder="Password" required="" type="password"> <i class="fa fa-lock"></i>
                      </div>
                      <div class="form-group relative">
                        <input class="form-control input-lg" id="login_password" placeholder="Repeat Password" required="" type="password"> <i class="fa fa-lock"></i>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Crear cuenta</button>
                      </div>
                      {{-- <div class="checkbox checkbox-success">
                        <input id="agree-terms" type="checkbox">
                        <label for="agree-terms">De acuerdo con nuestros t</label>
                      </div> --}}
                      <hr>
                      
                    </form>
                  </div>
                </div>
              </div>
        </div>

        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Iniciar Sesión</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="single-input-item">
                                <input type="email" name="email" placeholder="Correo electrónico" required />
                            </div>

                            <div class="single-input-item">
                                <input type="password" name="password" placeholder="Ingrese su contraseña" required />
                            </div>

                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Recuérdame</label>
                                        </div>
                                    </div>
                                    <a href="{{route('password.request')}}" class="forget-pwd">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Iniciar sesión</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2>Crear Cuenta</h2>
                        
                        {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                            @csrf


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" autofocus required/>
                                    </div>
        
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" name="surname" id="surname" placeholder="Apellido" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="single-input-item">
                                <input type="email" name="email" id="email" placeholder="Correo Electrónico" class="form-control" required />
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" id="password_confirm" placeholder="Confirma la contraseña" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta"> 
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                            <label class="custom-control-label" for="subnewsletter">Suscríbete a nuestro Newsletter</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Registrar</button>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
        
    </div>
</div>
<!-- login register wrapper end -->

<!-- brand area start -->
<div class="brand-area pt-34 pb-30">
    @include('web._brand_area')
</div>
<!-- brand area end -->

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
  
  $('ul.switcher li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('li').removeClass('active');
    $('div.tab-pane').removeClass('active');

    $(this).addClass('active');
    $("#"+tab_id).addClass('active');
  })

})
</script>
@endsection