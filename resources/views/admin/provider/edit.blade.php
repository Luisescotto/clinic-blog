@extends('layouts.admin')
@section('title', 'Editar proveedores')
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
                Editar proveedor
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Proveedor</h4>
                        </div>

                        {!! Form::model($provider, ['route' => ['providers.update', $provider], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$provider->name}}" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="text" name="email" id="email" value="{{$provider->email}}" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="rnc">Rnc</label>
                            <input type="text" name="rnc" id="rnc" value="{{$provider->rnc}}" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" value="{{$provider->address}}" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="phone">Teléfono/Celular</label>
                            <input type="text" name="phone" id="phone" value="{{$provider->phone}}" class="form-control" placeholder="" required>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('providers.index')}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('preference')
@endsection

@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection


