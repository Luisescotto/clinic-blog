@extends('layouts.admin')
@section('title', 'Registrar producto')
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
                Registro de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar producto</li>
                </ol>
            </nav>
        </div>

        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar producto</h4>
                        </div> --}}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" name="code" id="code" class="form-control">
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio</label>
                                <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="datetime-local" class="form-control" name="date" id="date" required>
                        </div>

                        <div class="form-group">
                          <label for="short_description">Extracto</label>
                          <textarea class="form-control" name="short_description" id="short_description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Descripción</label>
                            <textarea class="form-control" name="long_description" id="long_description" rows="8"></textarea>
                          </div>                       
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="category_id">Invitado</label>
                            <select class="select2 form-control" name="guest_id" id="guest_id" style="width: 100%">
                                @foreach($guests as $guest)
                                    <option value="{{$guest->id}}">{{$guest->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label for="category">Categoría</label>
                            <select class="select2 form-control" id="category" style="width: 100%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group">
                            <label for="subcategory_id">Subcategoría</label>
                            <select class="select2 form-control" name="subcategory_id" id="subcategory_id" style="width: 100%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="select2 form-control" name="provider_id" id="provider_id" style="width: 100%">
                                @foreach($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="tags">Etiquetas</label>
                          <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                          </select>
                        </div>

                    </div>
                </div>
            </div>
            
            
            
        </div>

        <div class="row">
            <div class="col-12 grid-margin">

                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">IMAGENES DEL PRODUCTO</h4>
                      <input type="file" name="images[]" id="images" class="dropify" multiple/>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
        <a href="{{route('products.index')}}" class="btn btn-light">Cancelar</a>
        {!! Form::close() !!}
    </div>
@endsection

@section('preference')
@endsection

@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('melody/js/dropify.js') !!}
    {!! Html::script('galio/js/dropzone.js') !!}
    {!! Html::script('ckeditor/ckeditor.js') !!}
    
    <script>
        CKEDITOR.replace('long_description');
    </script>
    <script>
        $(document).ready(function() {
        $('#category').select2();
        $('#guest_id').select2();
        $('#subcategory_id').select2();
        $('#provider_id').select2();
        $('#tags').select2();
        });
    </script>

@endsection
