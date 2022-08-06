@extends('layouts.admin')
@section('title', 'Editar Marcas')
@section('styles')
{!! Html::style('fileinput/css/fileinput.min.css') !!}
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
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
                Editar marca
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('brands.index')}}">Marcas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Marca</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Marca</h4>
                        </div>

                        {!! Form::model($brand, ['route' => ['brands.update', $brand], 'method' => 'PUT', 'files' => true]) !!}


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" required>{{$brand->description}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label for="files">Imagen de marca</label><br>
                                    <div class="kv-avatar">
                                      <div class="file-loading">
                                          <input id="files" name="files" type="file">
                                      </div>
                                  </div>
                                  <div class="kv-avatar-hint mb-3">
                                      <small class="form-text text-muted">Se utiliza un tamaño de 160x65 px</small>
                                  </div>
                                  @error('files')
                                        <span class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  <div id="kv-avatar-errors-1" class="center-block"></div>
                              </div>
                            </div>
                        </div>

                        

                    

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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}

<script>

    $(document).ready(function() {
        $("#files").fileinput({
                language: "es",
                theme: "fas",
                browseOnZoneClick: true,
                defaultPreviewContent: "<img src='{{$brand->image->url}}'>",
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