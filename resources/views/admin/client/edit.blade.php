@extends('layouts.admin')
@section('title', 'Editar cliente')
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
                Edición de clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar cliente</h4>
                        </div>

                        {!! Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT']) !!}


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$client->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="rnc">RNC</label>
                            <input type="number" class="form-control" name="rnc" id="rnc" value="{{$client->rnc}}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$client->address}}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{$client->phone}}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$client->email}}" required>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('clients.index')}}" class="btn btn-light">Cancelar</a>
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
    {!! Html::script('melody/js/dropify.js') !!}
@endsection

