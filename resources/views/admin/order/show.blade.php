@extends('layouts.admin')
@section('title', 'Detalles de orden')

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
                Detalles de orden 
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Ordenes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de orden</li>
                </ol>
            </nav>
        </div>

        


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row invoice-info">

                            {{-- 'name', 'description', 'logo', 'email', 'address', --}}

                            <div class="col-sm-4 invoice-col">
                              De
                              <address>
                                <strong>{{$business->name}}</strong><br>
                                {{$business->address}}<br>
                                Teléfono: {{$business->phone}}<br>
                                Correo electrónico: {{$business->email}}
                              </address>
                            </div>
                            <!-- /.col -->
                            {{-- <div class="col-sm-4 invoice-col">
                              A
                              <address>
                                <strong>{{$user->name}} 
                                    {{$user->profile->last_name}}
                                </strong><br>
                                {{$user->profile->address}}<br>
                                Phone: {{$user->profile->phone}}<br>
                                Email: {{$user->profile->email}}
                              </address>
                            </div> --}}
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              {{-- <b>Invoice #007612</b><br> --}}
                              <br>
                              <b>Estado:</b> {{$order->payment_status()}}<br>
                              <b>Fecha:</b> {{$order->order_date}}
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        

                        <br/>

                        <div class="form-group">
                            <h4 class="card-title">Detalles del pedido</h4>
                            <div class="table-responsive col-md-12">
                                <table id="orderDetails" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio Orden (DOP)</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal(DOP)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
    
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">SUBTOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">DOP {{number_format($order->subtotal(),2)}}</p>
                                            </th>
                                        </tr>
    
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO:</p>
                                            </th>
                                            <th>
                                                <p align="right">DOP {{number_format($order->total_tax(),2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">DOP {{number_format($order->total(),2)}}</p>
                                            </th>
                                        </tr>
    
                                    </tfoot>
                                    <tbody>
                                        @foreach($details as $detail)
                                        <tr>
                                            <td>{{$detail->product->name}}</td>
                                            <td>DOP {{number_format($detail->price,2)}}</td>
                                            <td>{{$detail->quantity}}</td>
                                            <td>DOP {{number_format($detail->total(),2)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{route('orders.index')}}" class="btn btn-primary float-right">Regresar</a>
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
