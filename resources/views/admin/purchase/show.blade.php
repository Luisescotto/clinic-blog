@extends('layouts.admin')
@section('title', 'Detalles de compra')

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
                Detalles de compra 
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de compra</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="nombre">Proveedor</label>
                                <p>{{$purchase->provider->name}}</p>
                            </div>
                        
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="nombre">Número de compra</label>
                                <p>{{$purchase->id}}</p>
                            </div>
                        
                            <br><br>
                        </div>
                        
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle de compra</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio (DOM)</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal (DOM)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th colspan="3">
                                                <p align="right">SUBTOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($subtotal,2)}} </p>
                                            </th>
                                        </tr>
                                       
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL IMPUESTO({{$purchase->tax}}%):</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($subtotal*$purchase->tax/100,2)}} </p>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($purchase->total,2)}} </p>
                                            </th>
                                        </tr>                   
                                    
                                    </tfoot>
                                    <tbody>
                                        @foreach ($purchaseDetails as $purchaseDetail)
                                            <tr>
                                                <td>{{$purchaseDetail->product->name}}</td>
                                                <td>S/{{$purchaseDetail->price}}</td>
                                                <td>{{$purchaseDetail->quantity}}</td>
                                                <td>S/{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{route('purchases.index')}}" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection

@section('scripts')
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
