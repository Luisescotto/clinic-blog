@extends('layouts.admin')
@section('title', 'Gestion de categorías')
@section('styles')
{!! Html::style('treegrid/css/jquery.treegrid.css') !!}

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
                Sección de Categorías
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorías</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorías</h4>

                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('categories.create')}}" class="dropdown-item" type="button">Agregar</a>
                                    <button class="dropdown-item" type="button">Exportar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <p id="selectTriggerFilter"><label><b>Filter:</b></label><br></p>

                            <table id="order-listing" class="table tree">
                                <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Nombre</th>
                                    <th>Módulo</th>
                                    <th>Cantidad</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                    <tr class="treegrid-{{$category->id}}">
                                        {{-- <th scope="row">{{$category->id}}</th> --}}
                                        <td>
                                            <a class="text-primary" href="{{route('categories.show', $category)}}">{{$category->name}}</a>

                                        </td>
                                        <td>
                                            <label class="badge badge-warning badge-pill">
                                                {{$category->categorizable_type()}}
                                            </label>
                                        </td>
                                        <td>
                                            <label class="badge badge-success badge-pill">
                                                ({{$category->item_numbers()}}) {{$category->categorizable_type()}}
                                            </label>
                                        </td>
                                        <td>{{$category->description}}</td>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE', 'class' => 'form_delete']) !!}

                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('categories.edit', $category)}}" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>


                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                    @if ($category->has_subcategory())
                                        @foreach ($category->subcategories as $subcategory)
                                        <tr class="treegrid-{{$subcategory->id}} treegrid-parent-{{$category->id}}">
                                            {{-- <th scope="row">{{$subcategory->id}}</th> --}}
                                            <td>
                                                <a href="{{route('categories.show', $subcategory)}}">{{$subcategory->name}}</a>
    
                                            </td>
                                            <td>
                                                <label class="badge badge-success badge-pill">
                                                    ({{$subcategory->item_numbers()}}) {{$subcategory->categorizable_type()}}
                                                </label>
                                            </td>
                                            <td>{{$subcategory->categorizable_type}}</td>
                                            <td>{{$subcategory->description}}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open(['route' => ['categories.destroy', $subcategory], 'method' => 'DELETE', 'class' => 'form_delete']) !!}
    
                                                <a class="jsgrid-button jsgrid-edit-button" href="{{route('categories.edit', $subcategory)}}" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
    
                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
    
                                                
    
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    
                                    
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer text-muted">
                        {{$categories->render()}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('preference')
@endsection

@section('scripts')
    {!! Html::script('treegrid/js/jquery.treegrid.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tree').treegrid().treegrid('collapseAll');;
        });
    </script>

{{-- <script>
(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
        responsive: true,
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        "info": "_TOTAL_ registros",
        "search": "Buscar",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior",
        },
        "lengthMenu": 'Mostrar <select class="form-control">' +
            '<option value="10">10</option>' +
            '<option value="30">30</option>' +
            '<option value="50">50</option>' +
            '<option value="100">100</option>' +
            '<option value="-1">Todo</option>' +
            '</select> registros',
        "loadinRecords": "Cargando...",
        "processing": "Procesando...",
        "emptyTable": "No hay datos",
        "zeroRecords": "No hay coincidencias",
        "infoEmpty": "",
        "infoFiltered": "",
      },
      initComplete: function(){
          var column = this.api().column(2);
          var select = $('<select class="form-control"><option value=""></option></select>')
          .appendTo('#selectTriggerFilter')
          .on('change', function(){
              var val = $(this).val();
              column.search(val).draw()
          });
          var offices = [];
          column.data().toArray().forEach(function(s){
              s = s.split(',');
              s.forEach(function(d){
                  if (!~offices.indexOf(d)){
                      offices.push(d)
                      select.append('<option value="'+ d + '">' + d + '</option>');
                  }
              })
          })
      }



    });
});
    })(jQuery);
</script> --}}


@endsection

