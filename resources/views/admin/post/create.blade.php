@extends('layouts.admin')
@section('title', 'Crear publicación')
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
                Crear publicación
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Publicaciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear publicación</li>
                </ol>
            </nav>
        </div>

        {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar producto</h4>
                        </div> --}}
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="datetime-local" class="form-control" name="date" id="date" required>
                        </div>

                        <div class="form-group">
                          <label for="excerpt">Resumen</label>
                          <textarea class="form-control" name="excerpt" id="excerpt" rows="3">{{old('excerpt')}}</textarea>
                          <small id="helpId" class="text-muted">Se recomienda de 200 a 300 caracteres</small>
                        </div>

                        <div class="form-group">
                            <label for="body">Contenido</label>
                            <textarea class="form-control" name="body" id="body" rows="10">{{old('body')}}</textarea>
                          </div>                       
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       
                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="select2 form-control" name="category_id" id="category_id" style="width: 100%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="tags">Etiquetas</label>
                          <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}"
                                    {{collect(old('tags'))->contains($tag->id) ? 'selected' : ''}}
                                    >{{$tag->name}}</option>
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
        <a href="{{route('posts.index')}}" class="btn btn-light">Cancelar</a>
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
        CKEDITOR.replace('body');
    </script>
    <script>
        $(document).ready(function() {
        $('#category_id').select2();
        $('#tags').select2();
        });
    </script>

@endsection
