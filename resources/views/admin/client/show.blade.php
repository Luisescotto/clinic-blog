@extends('layouts.admin')
@section('title', 'Información del cliente')

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
                {{$client->name}}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">

{{--                                    <img src="{{asset('image/'.$client->image)}}" alt="" class="img-lg mb-3">--}}

                                    <h3>{{$client->name}}</h3>
                                    <div class="d-flex justify-content-between"></div>
                                </div>

                                <div class="border-bottom py-4">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action active">
                                            Sobre proveedor
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Historial de Compras
                                        </button>
{{--                                        <button type="button" class="list-group-item list-group-item-action">--}}
{{--                                            Registrar Clientes--}}
{{--                                        </button>--}}
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Informacion del proveedor</h4>
                                    </div>
                                </div>


                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">

                                        <div class="form-group col-md-6">

                                            <strong><i class="fab fa-client-hunt mr-1"></i>Nombre:</strong>
                                            <p class="text-muted">
                                                {{$client->name}}
                                            </p>
                                            <hr>


                                            <strong><i class="fab fa-client-hunt mr-1"></i>RNC:</strong>
                                            <p class="text-muted">
                                                {{$client->rnc}}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-calendar-alt mr-1"></i>Dirección:</strong>
                                            <p class="text-muted">
                                                {{$client->address}}
                                            </p>
                                            <hr>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <strong><i class="fas fa-cube mr-1"></i>Teléfono:</strong>
                                            <p class="text-muted">
                                                {{$client->phone}}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-hand-holding-usd mr-1"></i>Email:</strong>
                                            <p class="text-muted">
                                            	{{$client->email}}
                                            </p>
                                            <hr>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{route('clients.index')}}" class="btn btn-primary float-right">Regresar</a>
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
