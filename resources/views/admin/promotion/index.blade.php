@extends('layouts.admin')
@section('title', 'Gestion de promociones')
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
                Sección de promociones
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">promociones</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Promociones</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('promotions.create')}}" class="dropdown-item" type="button">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="order-listing" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2"></th>
                                    <th rowspan="2">Nombre</th>
                                    <th class="text-center" colspan="2">Descuentos</th>

                                    <th rowspan="2">Fecha de inicio</th>
                                    <th rowspan="2">Fecha de finalización</th>
                                    <th rowspan="2">Estado</th>
                                    <th rowspan="2">Acciones</th>
                                </tr>
                                <tr>
                                    <th>Porcentaje</th>
                                    <th>Monto fijo</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($promotions as $promotion)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <a href="{{route('promotions.show', $promotion)}}">{{$promotion->name}}</a>

                                        </td>
                                        <td>{{$promotion->discount_rate}}%
                                            <span class="float-right text-success">
                                                <i class="fas {{$promotion->promotion_active()['icon_1']}}"></i>
                                            </span>
                                        </td>
                                        <td>{{$promotion->fixed_amount_discount}}$
                                            <span class="float-right text-success">
                                                <i class="fas {{$promotion->promotion_active()['icon_2']}}"></i>
                                            </span>
                                        </td>
                                        <td>{{$promotion->start_date->format('d/m/Y H:i:s')}}</td>
                                        <td>{{$promotion->ending_date->format('d/m/Y H:i:s')}}</td>

                                        <td>
                                            <label class="badge badge-{{$promotion->promotion_status()['color']}} badge-pill">
                                                {{$promotion->promotion_status()['text']}}
                                            </label>
                                        </td>

                                        <td style="width: 50px;">
                                            {!! Form::open(['route' => ['promotions.destroy', $promotion], 'method' => 'DELETE', 'class' => 'form_delete']) !!}

                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('promotions.edit', $promotion)}}" title="Editar">
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

