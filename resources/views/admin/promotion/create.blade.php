@extends('layouts.admin')
@section('title', 'Agregar Promociones')
@section('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
{!! Html::style('bootstrap-select/dist/css/bootstrap-select.min.css') !!}
{!! Html::style('datetimepicker/jquery.datetimepicker.css') !!}

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
                Agregar promociones
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('promotions.index')}}">Promociones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Promoción</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Agregar Promoción</h4>
                        </div>

                {!! Form::open(['route' => 'promotions.store', 'method' => 'POST']) !!}
                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="text" name="start_date" id="start_date" value="{{old('start_date')}}" class="date_time_picker form-control @error('start_date') is-invalid @enderror" placeholder="" required>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ending_date">Fecha de finalización</label>
                                <input type="text" name="ending_date" id="ending_date" value="{{old('ending_date')}}" class="date_time_picker form-control @error('ending_date') is-invalid @enderror" placeholder="" required>
                                @error('ending_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Tipo de descuento</label>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input radio_type" name="promotion_type" id="promotion_type1" value="percent">
                                    Porcentaje
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input radio_type" name="promotion_type" id="promotion_type2" value="fixed">
                                    Monto fijo
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>



                        <div class="col-md-4" id="div_discount_rate">
                            <div class="form-group">

                                <label for="discount_rate">Porcentaje de descuento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary text-white">$</span>
                                    </div>
                                    <input type="text" name="discount_rate" id="discount_rate" maxlength="8" pattern="[0-9 .]*" value="{{old('discount_rate')}}" class="form-control @error('discount_rate') is-invalid @enderror">
                                    @error('discount_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" id="div_fixed_amount_discount">
                            <div class="form-group">                                
                                <label for="fixed_amount_discount">Monto de descuento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary text-white">$</span>
                                    </div>
                                    <input type="number" name="fixed_amount_discount" id="fixed_amount_discount" step="0.01" value="{{old('fixed_amount_discount')}}" class="form-control @error('fixed_amount_discount') is-invalid @enderror">
                                    @error('fixed_amount_discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append">
                                      <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="products">Productos</label>
                              <select class="form-control selectpicker" name="products[]" id="products" data-live-search="true" data-size="4" multiple data-actions-box="true" data-selected-text-format="count > 1" title="Seleccione los productos a los que desea aplicar esta promoción" multiple>
                                  @foreach ($products as $product)
                                    <option value="{{$product->id}}"
                                        {{collect(old('products'))->contains($product->id) ? 'selected' : ''}}
                                    >({{$product->code}})-{{$product->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                    </div>


                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{URL::previous()}}" class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('preference')
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('bootstrap-select/js/bootstrap-select.js') !!}
    {!! Html::script('datetimepicker/build/jquery.datetimepicker.full.min.js') !!}  

<script>
    function discount_rate(){
        document.querySelector('#discount_rate').addEventListener('input', function(e){
        let int = e.target.value.slice(0, e.target.value.length - 1);

        if(int.length >= 3 && int.length <=4 && !int.includes('.')){
            e.target.value = int.slice(0, 2) + '.' + int.slice(2, 3);
            e.target.setSelectionRange(4, 4);
        } else if(int.length >=5 & int.length <=6){
            let whole = int.slice(0, 2);
            let fraction = int.slice(3, 5);
            e.target.value = whole + '.' + fraction;
        }else {
            e.target.value = int + ' ';
            e.target.setSelectionRange(e.target.value.length - 1, e.target.value.length - 1);
        }
    });

    function getInt(val){
        let v = parseFloat(val);
        if (v % 1 == 0) {
            return v;
        } else {
            let n = v.toString().split('.').join('');
            return parseInt(n);
        }
    }
    }

    $(document).ready(function(){

        var valor1 = $('#promotion_type1').val();
        if(valor1 == 'percent'){
            $("#div_discount_rate").css("display", "block");
            $("#div_fixed_amount_discount").css("display", "none");
            discount_rate();
        }else{
            $("#div_discount_rate").css("display", "none");
            $("#div_fixed_amount_discount").css("display", "block");
        }

        var valor2 = $('#promotion_type2').val();
        if(valor2 == 'fixed'){
            $("#div_discount_rate").css("display", "none");
            $("#div_fixed_amount_discount").css("display", "block");
            discount_rate();
        }else{
            $("#div_discount_rate").css("display", "block");
            $("#div_fixed_amount_discount").css("display", "none");
        }

        $(".radio_type").click(function(evento){
            var valor = $(this).val();
            if(valor == 'percent'){
                $("#div_discount_rate").css("display", "block");
                $("#div_fixed_amount_discount").css("display", "none");
                discount_rate();
            }else{
                $("#div_fixed_amount_discount").css("display", "block");
                $("#div_discount_rate").css("display", "none");
            }
        });
    });
</script>

<script>
    $(function () {
        $('select').selectpicker();
    });
</script>

<script>
    $(document).ready(function(){
        jQuery('.date_time_picker').datetimepicker({
            format:'d-m-Y H:i:s'
        });
    });
</script>

<script>
    $(document).ready(function(){
    $.datetimepicker.setLocale('es');
    });
</script>

@endsection


