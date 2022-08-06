@extends('layouts.admin')
@section('title', 'Gestion de Productos')
@section('styles')
    <style type="text/css">
        .unstyled-button{
            border: none;
            padding: 0;
            background: none;
            cursor: pointer;
        }
    </style>
        {!! Html::style('editable/jqueryui-editable/css/jqueryui-editable.css') !!}

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
                Sección de Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                            {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  {{-- <a href="{{route('products.create')}}" class="dropdown-item">Agregar</a> --}}
                                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal-2">Agregar</button>
                                  {{-- <a class="dropdown-item" href="{{route('print_barcode')}}">Exportar códigos de barras</a>  --}}
                                  {{--  <button class="dropdown-item" type="button">Another action</button>
                                  <button class="dropdown-item" type="button">Something else here</button>  --}}
                                </div>
                              </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <a target="_blank" href="{{route('web.product_details', $product)}}">{{$product->name}}</a>
                                        </td>
                                        <td>{{$product->date}}</td>
                                        <td>{{number_format($product->sell_price,2)}}</td>
                                        <td>{{$product->stock}}</td>

                                        @if ($product->category)
                                            <td>{{$product->category->name}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        
                                        <td class="second_td">
                                            <a 
                                                href="#" 
                                                id="username" 
                                                class="editable"
                                                data-type="select" 
                                                data-pk="{{$product->id}}"
                                                data-url="{{url("/change_status/products/$product->id")}}"  
                                                data-title="Estado" 
                                                data-value="{{$product->status}}">{{$product->status()}}
                                            </a>
                                        </td>

                                        {{-- @if ($product->status == 'Active')
                                            <td>
                                                <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}">
                                                    Activo <i class="fas fa-check"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}">
                                                    Desactivado <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        @endif --}}

                                        <td style="width: 50px;">
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('products.edit', $product)}}"
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE', 'class' => 'form_delete'],) !!}
                                            

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
    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Registrar nuevo producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['route'=>'products.store', 'method'=>'POST']) !!}
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Continuar</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
@endsection

@section('preference')
@endsection

@section('scripts')
{{-- {!! Html::script('melody/js/data-table.js') !!} --}}
{{-- {!! Html::script('melody/js/x-editable.js') !!} --}}
{{-- {!! Html::script('editable/jqueryui-editable/js/jqueryui-editable.min.js') !!} --}}
@include('sweetalert::alert')

{{-- <script>

    $('.form_delete')
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
    })
</script> --}}

<script>
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
    $.fn.editableform.buttons =
        '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
        '<i class="fa fa-check"></i>' +
        '</button>' +
        '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
        '<i class="fas fa-times"></i>' +
        '</button>';
    $(document).ready(function() {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });


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
        "fnRowCallback": function(nRow, mData, iDisplayIndex){
            $('#order-listing .second_td a').editable({
                type: 'select',
                name: 'Type',
                title: 'Type',
                source:[
                {value: "Shop", text: "Público"},
                {value: "Draft", text: "Borrador"},
                {value: "Disabled", text: "Deshabilitado"},
            ]
        });
        },      
    });
});

</script>

@endsection



