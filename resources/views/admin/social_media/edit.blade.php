@extends('layouts.admin')
@section('title', 'Editar redes sociales')
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
                Editar red social
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('social_medias.index')}}">redes sociales</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar red social</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar red social</h4>
                        </div>

                        {!! Form::model($social_media, ['route' => ['social_medias.update', $social_media], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$social_media->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <div id="icon_div">
                                    <label for="icon">Icono</label>
                                    <select class="form-control" name="icon" id="icon" required>
                                        <option value="" disabled selected>--seleccione un ícono--</option>
                                        <option value="fa-facebook">Facebook</option>
                                        <option value="fa-twitter">Twitter</option>
                                        <option value="fa-youtube">Youtube</option>
                                        <option value="fa-instagram">Instagram</option>
                                        <option value="fa-linkedin">Linkedin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url">Enlace de la página</label>
                            <input type="url" name="url" id="url" value="{{$social_media->url}}" class="form-control @error('url') is-invalid @enderror" placeholder="" required>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{URL::previous()}}" class="btn btn-light">Cancelar</a>
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


