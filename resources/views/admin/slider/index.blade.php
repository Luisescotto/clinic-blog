@extends('layouts.admin')
@section('title', 'Gestion de sliders')
@section('styles')
    <style type="text/css">
        .unstyled-button{
            border: none;
            padding: 0;
            background: none;
            cursor: pointer;
        }
    </style>

{!! Html::style('fileinput/css/fileinput.min.css') !!}
{!! Html::style('summernote/summernote.min.css') !!}


@endsection

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal-2">
      <span class="btn btn-primary">+ Agregar slider</span>
    </a>
    {{-- <button type="button" class="dropdown-item btn-primary" data-toggle="modal" data-target="#exampleModal-2">Agregar</button> --}}
</li>
@endsection

@section('options')
@endsection
@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Sección de sliders
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            @foreach ($sliders as $slider)
                
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <img class="card-img-top" src="{{$slider->image->url}}" alt="">
                <div class="card-body">
                  
                  {!! $slider->body !!}
                  
                </div>
                <div class="card-footer ">
                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between">
                        <a href="{{route('sliders.edit', $slider)}}" class="btn btn-outline-dark"><i class="btn-icon-append fas fa-edit"></i>Editar</a>
                        {!! Form::open(['route' => ['sliders.destroy', $slider], 'method' => 'DELETE', 'class' => 'form_delete']) !!}
                            <button type="submit" class="btn btn-danger btn-icon-text">Eliminar<i class="btn-icon-append fas fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
              </div>
            </div>

            @endforeach

          </div>

    </div>

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Agregar nuevo slider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['route'=>'sliders.store', 'method'=>'POST', 'files' => true]) !!}
            <div class="modal-body">

              
                <div class="row">

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="body">Contenido</label>
                        <textarea class="form-control summernote" name="body" id="body" rows="10"></textarea>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <div class="kv-avatar">
                            <label for="file">Galería de imágenes</label>
                            <div class="file-loading">
                                <input id="file" name="file" type="file">
                            </div>
                        </div>
                      </div>
                  </div>

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
    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('fileinput/js/fileinput.min.js') !!}
    {!! Html::script('fileinput/js/locales/es.js') !!}
    {!! Html::script('fileinput/themes/fas/theme.js') !!}
    {!! Html::script('summernote/summernote.min.js') !!}


    <script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 210
        });
    });
    </script>
    <script>

        $(document).ready(function() {
            $("#file").fileinput({
                    language: "es",
                    theme: "fas",
                    browseOnZoneClick: true,
                    overwriteInitial: true,
                    browseClass: "btn btn-primary btn-block",
                    browseIcon: '<i class="far fa-folder-open"></i>',
                    removeIcon: '<i class="fas fa-times"></i>',
                    removeTitle: 'Cancel or reset changes',
                    elErrorContainer: '#kv-avatar-errors-1',
                    showCaption: false,
                    showRemove: false,
                    showClose: false,
                    browseLabel: '',
                    removeLabel: '',
                    overwriteInitial: true,
                    msgErrorClass: 'alert alert-block alert-danger',
                    layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
                    allowedFileExtensions: ["jpg", "png", "gif"],
            });  
    });
    </script>
    
@endsection

