@extends('layouts.admin')
@section('title', 'Información del producto')

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
                {{$product->name}}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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

                                    {{-- <img src="{{asset('image/'.$product->image)}}" alt="" class="img-lg mb-3"> --}}

                                    <h3>{{$product->name}}</h3>
                                    <div class="d-flex justify-content-between"></div>
                                </div>

{{--                                <div class="border-bottom py-4">--}}
{{--                                    <div class="list-group">--}}
{{--                                        <button type="button" class="list-group-item list-group-item-action active">--}}
{{--                                            Sobre proveedor--}}
{{--                                        </button>--}}
{{--                                        <button type="button" class="list-group-item list-group-item-action">--}}
{{--                                            Productos--}}
{{--                                        </button>--}}
{{--                                        <button type="button" class="list-group-item list-group-item-action">--}}
{{--                                            Registrar Productos--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Estado
                                        </span>
                                        <span class="float-right text-muted">{{$product->status()}}</span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">
                                            Proveedor
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="{{route('providers.show', $product->provider)}}">
                                                {{$product->provider->name}}
                                            </a>
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">
                                            Categoría
                                        </span>
                                        <span class="float-right text-muted">

                                            {{$product->subcategory->name}}

                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">
                                            Invitado
                                        </span>
                                        <span class="float-right text-muted">{{$product->guest->name}}</span>
                                    </p>

                                </div>

                            @if ($product->status == 'Active')
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-danger btn-block">Desactivado</a>
                            @endif

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

                                            <strong><i class="fab fa-product-hunt mr-1"></i>Código:</strong>
                                            <p class="text-muted">
                                                {{$product->code}}0
                                            </p>
                                            <hr>


                                            <strong><i class="fas fa-info-circle mr-1"></i>Descripción:</strong>
                                            <p class="text-muted">
                                                {{$product->description}}
                                            </p>
                                            <hr>

                                            <strong><i class="far fa-calendar-alt mr-1"></i>Fecha:</strong>
                                            <p class="text-muted">
                                                {{$product->date}}
                                            </p>
                                            <hr>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <strong><i class="fas fa-cubes mr-1"></i>Stock:</strong>
                                            <p class="text-muted">
                                                {{$product->stock}}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-hand-holding-usd mr-1"></i>Precio:</strong>
                                            <p class="text-muted">
                                            	{{$product->sell_price}}
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-envelope mr-1"></i> Código de barras</strong>
                                            <p class="text-muted">
                                                {!!DNS1D::getBarcodeHTML($product->code, 'EAN13'); !!}
                                            </p>
                                            


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>
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
