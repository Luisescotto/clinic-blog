@extends('layouts.admin')
@section('title', 'Editar producto')
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
                Edición de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
                </ol>
            </nav>
        </div>

    {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
        
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{old('name',$product->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" name="code" value="{{old('code',$product->code)}}" id="code" class="form-control @error('code') is-invalid @enderror">
                                <small id="helpId" class="text-muted">Campo opcional</small>
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio</label>
                                <input type="number" name="sell_price" value="{{old('sell_price',$product->sell_price)}}" id="sell_price" class="form-control @error('sell_price') is-invalid @enderror" placeholder="" required>
                                @error('sell_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <div id="div_date">
                                <label for="date">Fecha</label>
                                <div class="input-group date datepicker">
                                    <input type="text" id="datetimepicker-popup" class="form-control @error('date') is-invalid @enderror" name="date" 
                                    value="{{old('date', $product->date ? $product->date : null) }}" required>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="far fa-calendar input-group-text"></span>
                                    </span>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="short_description">Extracto</label>
                          <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description" rows="3">{{old('short_description',$product->short_description)}}</textarea>
                          @error('short_description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_description">Descripción</label>
                            <textarea class="form-control @error('long_description') is-invalid @enderror" name="long_description" id="long_description" rows="8">{{old('long_description',$product->long_description)}}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="status">Estado de publicación</label>
                            <select class="form-control" name="status" id="status">
                                @foreach (get_product_statuses() as $status)
                                  <option value="{{$status['code']}}"
                                  {{old('status', $product->status) == $status['code'] ? 'selected' : ''}}
                                  >{{ $status['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="guest_id">Invitado</label>
                            <select class="select2 form-control @error('guest_id') is-invalid @enderror" name="guest_id" id="guest_id" style="width: 100%">
                                @foreach($guests as $guest)
                                    <option value="{{$guest->id}}"
                                        
                                        {{old('guest_id', $product->guest_id) == $guest->id ? 'selected' : ''}}

                                        >{{$guest->name}}</option>
                                @endforeach
                            </select>
                            @error('guest_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="select2 form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" style="width: 100%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" 
                                        {{old('category_id', $product->category_id) == $category->id ? 'selected' : ''}}
                                        >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="select2 form-control @error('provider_id') is-invalid @enderror" name="provider_id" id="provider_id" style="width: 100%">
                                @foreach($providers as $provider)
                                    <option value="{{$provider->id}}"
                                        
                                        
                                        {{old('provider_id', $product->provider_id) == $provider->id ? 'selected' : ''}}

                                        
                                        >{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="tags">Etiquetas</label>
                          <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}"
                                    
                                    {{collect(old('tags', $product->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}
                                
                                    >{{$tag->name}}</option>
                            @endforeach
                          </select>
                          @error('provider_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror
                        </div>

                        {{-- <div class="form-group">
                            <h4 class="card-title">SUBIR IMAGENES</h4>
                            <div class="file-upload-wrapper">
                                <div id="fileuploader">SUBIR</div>
                            </div>
                        </div> --}}

                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('products.index')}}" class="btn btn-light">Cancelar</a>
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
                        @error('files')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="kv-avatar-errors-1" class="center-block"></div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <input type="hidden" id="csrf_token" name="_token" value="{{csrf_token() }}">

@endsection

@section('preference')
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

{{-- {!! Html::script('melody/js/jquery-file-upload.js') !!} --}}
{{-- {!! Html::script('melody/js/dropify.js') !!} --}}
{!! Html::script('ckeditor/ckeditor.js') !!}
{{-- {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!} --}}
{{-- {!! Html::script('melody/js/light-gallery.js') !!} --}}
{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}
{!! Html::script('datetimepicker/build/jquery.datetimepicker.full.min.js') !!}  

@include('sweetalert::alert')


<script>
    CKEDITOR.replace('long_description');
</script>
<script>
    $(document).ready(function(){
        jQuery('#datetimepicker-popup').datetimepicker();
    });
</script>
<script>
    $(document).ready(function() {
    $('#category_id').select2();
    $('#guest_id').select2();
    $('#provider_id').select2();
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
                uploadUrl: "/upload_images_products/{{$product->id}}/",
                deleteUrl: "/file_delete",
                uploadExtraData:{'_token':$("#csrf_token").val()},
                deleteExtraData:{'_token':$("#csrf_token").val()},
                initialPreview: [
                    <?php foreach ($product->images as $image)
                    {
                        echo '"'.$image->url.'",';
                    } ?>
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    <?php foreach ($product->images as $image){
                        echo '{width:"120px",key:'.$image->id.'},';
                    } ?>
                ],
                overwriteInitial: false,
                browseClass: "btn btn-primary btn-block",
                showCaption: false,
                showRemove: false,
                showClose: false,
                showUpload: false,
                msgErrorClass: 'alert alert-block alert-danger',
                elErrorContainer: '#kv-avatar-errors-1',

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
        $.alert('File deletion was successful!' + krajeeGetCount('file-6'));
    }, 900);
});;  
});
</script>



@endsection