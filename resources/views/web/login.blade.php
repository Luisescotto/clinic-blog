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
                {{-- <div class="col-lg-6">
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
                </div> --}}
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
@endsection