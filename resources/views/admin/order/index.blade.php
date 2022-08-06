@extends('layouts.admin')
@section('title', 'Gestion de pedidos')
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
                Sección de Pedidos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Pedidos</h4>

                            <div class="btn-group">
                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Total</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $key => $order)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$order->order_date()}}</td>
                                            <td class="second_td">
                                                <a 
                                                    href="#" 
                                                    id="username" 
                                                    data-type="select" 
                                                    data-pk="{{$order->id}}" 
                                                    data-url="{{url("/orders_update/$order->id")}}" 
                                                    data-title="Estado" 
                                                    data-value="{{$order->shipping_status}}">{{$order->shipping_status()}}
                                                </a>
                                            </td>
                                            

                                            <td>Dop</> {{number_format($order->total())}}</td>

                                            <td style="width: 50px;">
                                                <a class="jsgrid-button jsgrid-edit-button" href="{{route('orders.show', $order)}}" title="Ver detalles">
                                                    <i class="far fa-eye"></i>
                                                </a>
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
    {{-- {!! Html::script('melody/js/data-table.js') !!} --}}


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
                {value: "Pending", text: "Pendiente"},
                {value: "Approved", text: "Aprobado"},
                {value: "Delivered", text: "Entregado"},
                {value: "Cancelled", text: "Cancelado"},
            ]
        });
        },      
    });         
});

</script>


@endsection

