@extends('layouts.admin')
@section('title', 'Gestion de usuarios')
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
                Sección de usuarios
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Usuarios</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('users.create')}}" class="dropdown-item" type="button">Agregar</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <a href="{{route('users.show', $user)}}">{{$user->name}}</a>
                                        </td>
                                        <td>
                                            @foreach ($user->getRoleNames() as $role)
                                                {{$role}}
                                                @if ($loop->last)
                                                
                                                @else
                                                ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td style="width: 50px;">
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('users.edit', $user)}}"
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- {!! Form::open(['route' => ['users.destroy', $user], 'method' => 'DELETE']) !!}
                                            

                                            <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                            type="submit" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!} --}}
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

