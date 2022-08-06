@extends('layouts.admin')
@section('title', 'Gestion de Clientes')
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
                Sección de Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('clients.create')}}" class="dropdown-item" type="button">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
{{--                                    'name', 'rnc', 'address', 'phone', 'email',--}}
                                    
                                    <th>Nombre</th>
                                    <th>RNC</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($clients as $client)
                                    <tr>
                                        <td>
                                            <a href="{{route('clients.show', $client)}}">{{$client->name}}</a>
                                        </td>
                                        <td>{{$client->rnc}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>{{$client->email}}</td>
                                        
                                        <td>
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('clients.edit', $client)}}"
                                            title="Editar">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                        </td>

                                        {{-- <td style="width: 50px;">
                                            {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'DELETE']) !!}
                                            

                                            <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                    type="submit" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td> --}}
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

