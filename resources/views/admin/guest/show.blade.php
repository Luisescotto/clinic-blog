@extends('layouts.admin')
@section('title', 'Información del Invitado')

@section('styles')
@endsection
@section('create')
@endsection
@section('options')
@endsection
@section('preference')
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Invitado
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('guests.index')}}">Invitados</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$guest->name}}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{asset('image/'.$guest->image)}}" alt="" class="img-lg mb-3">
                                    <h3>{{$guest->name}}</h3>
                                    <div class="d-flex justify-content-between"></div>
                                </div>

                                <strong><i class="fab fa-product-hunt mr-1"></i>Información:</strong>
                                            <p class="text-muted">
                                                {{$guest->description}}
                                            </p>
                                            <hr>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{route('guests.index')}}" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection

@section('scripts')
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
