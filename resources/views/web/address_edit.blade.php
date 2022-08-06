@extends('web.my_account')

@section('content_tab')
    

<div class="col-lg-9 col-md-8">
    {{-- <div class="tab-content" id="myaccountContent"> --}}
       
        {{-- <div class="tab-pane fade" id="orders" role="tabpanel"> --}}
            

<!-- Single Tab Content Start -->
    <div class="myaccount-content">
        <h3>Billing Address</h3>
        <address>
            <p><strong>{{$user->name}} {{$user->surname}}</strong></p>
            <p>{{$profile->address}} <br></p>
            <p>Mobile: {{$profile->phone}}</p>
        </address>
        <a href="#" class="check-btn sqr-btn " data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i> Editar dirección</a>
        
    </div>

<!-- Single Tab Content End -->




        {{-- </div> --}}

    {{-- </div> --}}

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h4 class="modal-title">Editar dirección</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            {!! Form::model($profile, ['route' => ['update_profile',$profile], 'method'=>'PUT']) !!}
            <div class="modal-body">
                <div class="single-input-item">
                    <label for="address" class="required">Dirección de envío</label>
                    <input type="text" id="address" name="address" value="{{old('address', $profile->address)}}" placeholder="Dirección de envío" />
                </div>
                <div class="single-input-item">
                    <label for="phone" class="required">Número de teléfono</label>
                    <input type="number" id="phone" name="phone" value="{{old('phone', $profile->phone)}}" placeholder="Número de teléfono" />
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="check-btn sqr-btn ">Guardar cambios</button>
            </div>
            {!! Form::close() !!}

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div> 

@endsection