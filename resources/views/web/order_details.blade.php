@extends('web.my_account')
@section('title', 'Detalles de orden')
@section('content_tab')
    

<div class="col-lg-9 col-md-8">
   
            <div class="myaccount-content">
                <h3>Detalles de pedido</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table id="orderDetails" class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio Orden</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
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
                                <td>DOP {{number_format($detail->total(),2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
</div> 


@endsection
