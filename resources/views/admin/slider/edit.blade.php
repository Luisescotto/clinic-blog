@extends('layouts.admin')
@section('title', 'Editar Sliders')
@section('styles')
{!! Html::style('fileinput/css/fileinput.min.css') !!}
{!! Html::style('summernote/summernote.min.css') !!}
<style>
    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar {
        display: inline-block;
    }
    .kv-avatar .file-input {
        display: table-cell;
    }
    .kv-reqd {
        color: red;
        font-family: monospace;
        font-weight: normal;
    }
    </style>

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
                Editar slider
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('sliders.index')}}">Sliders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Slider</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Slider</h4>
                        </div>

                        {!! Form::model($slider, ['route' => ['sliders.update', $slider], 'method' => 'PUT', 'files' => true]) !!}
                        
                        
                        <div class="row">

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="body">Contenido</label>
                                <textarea class="form-control summernote" name="body" id="body" rows="10">{!! $slider->body !!}</textarea>
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

                        {{-- <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" required>{{$slider->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
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
                defaultPreviewContent: "<img src='{{$slider->image->url}}' style='width: 100%'>",
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
                maxImageWidth: 160,
                maxImageHeight: 65
        });  
});
</script>
@endsection


