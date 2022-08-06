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
                            <li class="breadcrumb-item active" aria-current="page">Verificación</li>
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

            <div class="col-lg-12">
                <div class="login-reg-form-wrap  pr-lg-50">
                    
                        <h2 class="active">{{ __('Verificación de correo electrónico') }}</h2>
                        <hr>
        
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Se ha enviado un nuevo enlace de verificación.') }}
                                </div>
                            @endif
                            <h3 style="color: #020202">
                            {{ __('Antes de continuar, por favor revisa tu correo electrónico, te hemos enviado un enlace de verificación.') }}
                            </h3>
                            <h4 style="color: #020202">
                            {{ __('Si no recibiste el correo') }},
                           
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Volver a enviar el correo') }}</button>.
                            </form>
                        </h4>
                </div>
            </div>
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

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificación de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revisa tu correo electrónico, te hemos enviado un link de verificación.') }}
                    {{ __('Si no recibiste el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Volver a enviar el correo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
