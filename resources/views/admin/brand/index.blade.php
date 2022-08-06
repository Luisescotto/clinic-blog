@extends('layouts.admin')
@section('title', 'Gestion de marcas')
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
                Sección de marcas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">marcas</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Marcas</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('brands.create')}}" class="dropdown-item" type="button">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($brands as $brand)
                                    <tr>
                                        <td>
                                            <a href="{{route('brands.show', $brand)}}">{{$brand->name}}</a>

                                        </td>
                                        <td>{{$brand->description}}</td>
                                        <td class="py-1">
                                            <img src="{{$brand->image->url}}" alt="" class="img-sm rounded-circle">
                                        </td>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route' => ['brands.destroy', $brand], 'method' => 'DELETE', 'class' => 'form_delete']) !!}

                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('brands.edit', $brand)}}" title="Editar">
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

