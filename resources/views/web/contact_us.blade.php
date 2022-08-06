@extends('layouts.web')
@section('meta_description', '')
@section('title', 'Contacto')
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
                                    <li class="breadcrumb-item active" aria-current="page">Contáctanos</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area pb-34 pb-md-18 pb-sm-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>Déjanos un mensaje</h2>
                            <form action="{{route('contact.mail.store')}}" method="post" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_first_name" placeholder="Nombre *" type="text" required>    
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_phone" placeholder="Teléfono *" type="text" required>   
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_email_address" placeholder="Correo Electrónico *" type="text" required>    
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Asunto *" type="text">   
                                    </div>
                                <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Mensaje *" name="contact_message"  class="form-control2" required=""></textarea>     
                                        </div>   
                                        <div class="contact-btn">
                                            <button class="sqr-btn" type="submit">Enviar Mensaje</button> 
                                        </div> 
                                    </div> 
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>    
                        </div> 
                    </div>
        

                    <div class="col-lg-6">
                        <div class="contact-info mt-md-28 mt-sm-28">
                            <h2>También a través de:</h2>
                            <p>{{$web_company->contact_text}}</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Dirección: {{$web_company->address}}</li>
                                <li><i class="fa fa-phone"></i> {{$web_company->phone}}</li>
                                <li><i class="fa fa-envelope-o"></i> {{$web_company->email}}</li>
                            </ul>
                            <div class="working-time">
                                <h3>Horario de atención</h3>
                                <p><span>{{$web_company->hours_of_operation}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->

        <!-- map area start -->
        <div class="map-area-wrapper">
            <div class="container">
                <div 
                    id="map_content" data-lat="{{$web_company->latitude}}" data-lng="{{$web_company->length}}" 
                    data-zoom="18" data-maptitle="{{$web_company->name}}" 
                    data-mapaddress="{{$web_company->address}}">
                </div>
            </div>
        </div>


        <!-- map area end -->

        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->

        @endsection

@section('scripts')

@endsection