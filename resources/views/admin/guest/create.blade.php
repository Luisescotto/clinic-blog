@extends('layouts.admin')
@section('title', 'Registrar Seminaristas')
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
                Registrar Seminarista
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('guests.index')}}">Seminaristas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar Seminarista</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Seminarista</h4>
                        </div>

                        {!! Form::open(['route' => 'guests.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="10" required></textarea>
                        </div>

                        <div class="card-body">
                            <h4 class="card-title d-flex">Seleccionar Archivo
                            </h4>
                            <input type="file" id="picture" name="picture" lang="es" class="dropify" />
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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
    {!! Html::script('melody/js/dropify.js') !!}
@endsection

