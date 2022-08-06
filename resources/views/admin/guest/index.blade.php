@extends('layouts.admin')
@section('title', 'Gestion de Seminaristas')
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
                Sección de Seminaristas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seminaristas</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Seminaristas</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('guests.create')}}" class="dropdown-item" type="button">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Detalles</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($guests as $guest)
                                    <tr>
                                        <td>{{$guest->name}}</td>
                                        <td>{{$guest->description}}</td>
                                        <td><a class="jsgrid-button jsgrid-edit-button" href="#" data-toggle="modal" data-target="#exampleModal-{{$guest->id}}"><i class="far fa-eye"></i></a></td>
                                        <td style="width: 150px;">
                                            
                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('guests.edit', $guest)}}" title="Editar">
                                             <i class="fas fa-edit"></i>
                                         </a>
                                            {{-- {!! Form::open(['route' => ['guests.destroy', $guest], 'method' => 'DELETE']) !!}
                                           

                                            <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                    type="submit" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal-{{$guest->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Información de Seminarista</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                    
                                    
                                    
                                                <div class="modal-body">
                                                    <div class="text-center form-group">
                                                        <img src="{{asset('image/'.$guest->image)}}" alt="" class="img-fluid my-3">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" id="name" value="{{$guest->name}}"
                                                            aria-describedby="helpId" disabled>
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <label for="description">Descripción</label>
                                                        <textarea class="form-control" name="description" id="description"
                                                            rows="3" disabled>{{$guest->description}}</textarea>
                                                    </div>
                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                                </div>
                                    
                                            
                                    
                                            </div>
                                        </div>
                                    </div>
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

