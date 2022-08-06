@extends('layouts.admin')
@section('title', 'Modificar publicación')
@section('styles')
{!! Html::style('fileinput/css/fileinput.min.css') !!}
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
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
                Modificar publicación
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Publicaciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar publicación</li>
                </ol>
            </nav>
        </div>

        {!! Form::model($post, ['route'=>['posts.update', $post], 'method' => 'PUT']) !!}
        <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <input type="hidden" id="csrf_token" name="_token" value="{{csrf_token() }}">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('title', $post->title)}}" required>
                        </div>

                        <div class="form-group">
                          <label for="excerpt">Resumen</label>
                          <textarea class="form-control" name="excerpt" id="excerpt" rows="3">{{old('excerpt', $post->excerpt)}}</textarea>
                          <small id="helpId" class="text-muted">Se recomienda de 200 a 300 caracteres</small>
                        </div>

                        <div class="form-group">
                            <label for="body">Contenido</label>
                            <textarea class="form-control" name="body" id="body" rows="10">{{old('body', $post->body)}}</textarea>
                          </div>                       
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                          <label for="status">Estado de publicación</label>
                          <select class="form-control" name="status" id="status" onchange="showInp()"  required>
                           
                            <option value="Public"
                            {{old('status',$post->status) == 'Public' ? 'selected' : ''}} 
                            >Público</option>

                            <option value="Program"
                            {{old('status',$post->status) == 'Program' ? 'selected' : ''}} 
                            >Programar</option>

                            <option value="Draft"
                            {{old('status',$post->status) == 'Draft' ? 'selected' : ''}} 
                            >Borrador</option>

                            <option value="Hidden"
                            {{old('status',$post->status) == 'Hidden' ? 'selected' : ''}} 
                            >Oculto</option>

                          </select>
                        </div>

                          <div class="form-group">
                            <div id="div_date">
                            <label for="published_at">Fecha de publicación</label>
                            <div class="input-group date datepicker">
                              <input type="text" class="form-control" id="datetimepicker-popup" name="published_at"
                              value="{{old('published_at', $post->published_at ? $post->published_at->format('d-m-Y H:i') : null) }}"
                              >
                              <span class="input-group-addon input-group-append border-left">
                                <span class="far fa-calendar input-group-text"></span>
                              </span>
                            </div>
                            </div>
                          </div>
                       
                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="select2 form-control" name="category_id" id="category_id" style="width: 100%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="tags">Etiquetas</label>
                          <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}"
                                    {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}
                                    >{{$tag->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="iframe">Iframe</label>
                          <textarea class="form-control" name="iframe" id="iframe" rows="8">{{old('iframe', $post->iframe)}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('posts.index')}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 grid-margin">

                <div class="card">
                    <div class="card-body">
                        <label for="files">Galería de imágenes</label>
                        <div class="file-loading">
                            <input id="files" name="files[]" type="file" multiple>
                        </div>
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

    {{-- {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('melody/js/dropify.js') !!} --}}
    {{-- {!! Html::script('melody/js/formpickers.js') !!} --}}

    {!! Html::script('datetimepicker/build/jquery.datetimepicker.full.min.js') !!}  

    {!! Html::script('ckeditor/ckeditor.js') !!}
    {!! Html::script('fileinput/js/fileinput.min.js') !!}
    {!! Html::script('fileinput/js/locales/es.js') !!}
    {!! Html::script('fileinput/themes/fas/theme.js') !!}

    <script>
        $(document).ready(function(){
            getSelectValue = document.getElementById("status").value;
            if(getSelectValue=="Program"){
                document.getElementById("div_date").style.display = "inline";
            }else{
                document.getElementById("div_date").style.display = "none";
            }
        });  
    </script>

    <script>
        function showInp(){
            getSelectValue = document.getElementById("status").value;
            if(getSelectValue=="Program"){
                document.getElementById("div_date").style.display = "inline";
            }else{
                document.getElementById("div_date").style.display = "none";
            }
        }
    </script>
    
    <script>
        CKEDITOR.replace('body');
    </script>
    <script>
        $(document).ready(function(){
            jQuery('#datetimepicker-popup').datetimepicker({
                format:'d-m-Y H:i:s'
            });
        });
    </script>

    <script>
        $(document).ready(function(){
        $.datetimepicker.setLocale('es');
        });
    </script>

    <script>
        $(document).ready(function() {
        $('#category_id').select2();
        $('#tags').select2();
        });
    </script>

    <script>

        $(document).ready(function() {
            var krajeeGetCount = function(id) {
            var cnt = $('#' + id).fileinput('getFilesCount');
            return cnt === 0 ? 'You have no files remaining.' :
                'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
        };
            $("#files").fileinput({
                    language: "es",
                    theme: "fas",
                    browseOnZoneClick: true,
                    uploadUrl: "/upload_image/{{$post->id}}/",
                    deleteUrl: "/file_delete",
                    uploadExtraData:{'_token':$("#csrf_token").val()},
                    deleteExtraData:{'_token':$("#csrf_token").val()},
                    initialPreview: [
                        <?php foreach ($post->images as $image)
                        {
                            echo '"'.$image->url.'",';
                        } ?>
                    ],
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreviewConfig: [
                        <?php foreach ($post->images as $image){
                            echo '{width:"120px",key:'.$image->id.'},';
                        } ?>
                    ],
                    overwriteInitial: false,
                    browseClass: "btn btn-primary btn-block",
                    showCaption: false,
                    showRemove: false,
                    showUpload: false,
            }).on('filebeforedelete', function() {
        return new Promise(function(resolve, reject) {
            $.confirm({
                title: 'Confirmation!',
                content: 'Are you sure you want to delete this file?',
                type: 'red',
                buttons: {   
                    ok: {
                        btnClass: 'btn-primary text-white',
                        keys: ['enter'],
                        action: function(){
                            resolve();
                        }
                    },
                    cancel: function(){
                        $.alert('File deletion was aborted! ' + krajeeGetCount('file-6'));
                    }
                }
            });
        });
    }).on('filedeleted', function() {
        setTimeout(function() {
            $.alert('File deletion was successful! ' + krajeeGetCount('file-6'));
        }, 900);
    });;  
        });
    </script>

@endsection
