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
                                    <li class="breadcrumb-item active" aria-current="page">Invitado</li>
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
                            <h2><span>{{$guest->name}}</span></h2>
                            <p>{{$guest->description}}</p>
                        </div>
                    </div>
                    <!-- About Text End -->
                    <!-- About Image Start -->
                    <div class="col-lg-5 ml-auto">
                        <div class="about-image-wrap mt-md-26 mt-sm-26">
                            <img src="{{$guest->image}}" alt="{{$guest->name}}">
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
                @if ($guest->products) 
                <div class="row">
                    
                    <div class="col-12">
                        <div class="title-box text-center mb-10">
                            <h3>Eventos</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                                       
                    @foreach ($guest->products as $product)
                        
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30">
                            <div class="team-thumb img-full">
                                <img src="{{$product->images->pluck('url')[0]}}" alt="">
                                <div class="team-social">
                                    <h6><a href="{{route('web.product_details', $product)}}" style="color: #020202"><i class="fa fa-shopping-cart"></i></a></h6>

                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3 style="color: #e6a15c">{{$product->name}}</h3>
                                <p style="color: #fff">{{$product->short_description}}</p>
                            </div>
                        </div>
                    </div> <!-- end single team member -->


                    

                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <!-- team area end -->


        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->
        

        @endsection

@section('scripts')
@endsection