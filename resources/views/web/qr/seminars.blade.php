@extends('layouts.web')
@section('meta_description', '')
@section('title', $user->name)
@section('styles')



@endsection
@section('content')
<div class="col-lg-8 m-5 mx-auto">
    <div class="myaccount-content">
            <h3>Seminarios adquiridos</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse ($orders as $key => $order)
                            @foreach ($order->order_details as $detail)
                                
                            
                                <tr>
                                    <td>{{$detail->product->name}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->payment_status()}}</td>
                                </tr>
                            @endforeach
                        @empty

                        <tr>
                            <td colspan="5">
                                No ha adquirido ninguna entrada.
                            </td>
                        </tr>
                            
                        @endforelse

                        </tbody>
                    </table>
                </div>
</div>
</div>
@endsection