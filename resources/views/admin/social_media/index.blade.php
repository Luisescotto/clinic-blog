@extends('layouts.admin')
@section('title', 'Gestion de redes sociales')
@section('styles')
    <style type="text/css">
        .unstyled-button{
            border: none;
            padding: 0;
            background: none;
            cursor: pointer;
        }
    </style>
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
                Sección de redes sociales
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Redes sociales</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if ($alert = Session::get('exito'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Holy {{$alert}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Redes sociales</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('social_medias.create')}}" class="dropdown-item" type="button">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Icono</th>
                                    <th>URL</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($social_medias as $social_media)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$social_media->name}}</td>
                                        <td>{{$social_media->icon}}</td>
                                        <td><a target="_blank" href="{{url($social_media->url)}}">{{url($social_media->url)}}</a></td>
                                        <td style="width: 50px;">
                                            
                                            {!! Form::open(['route' => ['social_medias.destroy', $social_media], 'method' => 'DELETE', 'class' => 'form_delete']) !!}
                                                <a class="jsgrid-button jsgrid-edit-button" href="{{route('social_medias.edit', $social_media)}}" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            
                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                    
                                    
                                @endforeach

                                </tbody>
                            </table>
                        </div>

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

