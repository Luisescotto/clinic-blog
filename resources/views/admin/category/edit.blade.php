@extends('layouts.admin')
@section('title', 'Editar categorías')
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
                Editar categoría
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Categoría</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Categoría</h4>
                        </div>

                        {!! Form::model($category,['route' => ['categories.store', $category], 'method' => 'PUT']) !!}

                        @if ($category->categorizable_type == 'Product')
                        
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{old('name', $category->name)}}" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="10" required>{{old('description', $category->description)}}</textarea>
                            </div>
                        

                        

                        @if ($category->parent_id == null)
                            <div class="col">
                                <div class="form-group">
                                    <div id="icon_div">
                                        <label for="icon">Icono</label>
                                        <select class="form-control" name="icon" id="icon" required>
                                            <option value="" selected>--seleccione un ícono--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @else
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{old('name', $category->name)}}" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="10" required>{{old('description', $category->description)}}</textarea>
                            </div>
                        @endif


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('categories.index')}}" class="btn btn-light">Cancelar</a>
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

<script>
    $(document).ready(function(){
        document.getElementById("superior_div").style.display = "none";
        document.getElementById("icon_div").style.display = "none";
        $(document).on('change', '#parent_id', function(event){
            parent_text = $("#parent_id option:selected").text();
            if(parent_text == '--ninguna--'){
                document.getElementById("icon_div").style.display = "inline"
            }else{
                document.getElementById("icon_div").style.display = "none"
            }
        });
    });
</script>

<script>
    function showInp(){
        getSelectValue = document.getElementById("type").value;
        if(getSelectValue=="Product"){
            document.getElementById("icon_div").style.display = "inline";
            document.getElementById("superior_div").style.display = "inline";
        }else if(getSelectValue=="Post"){
            document.getElementById("icon_div").style.display = "none";
            document.getElementById("superior_div").style.display = "none";

        }
    }
</script>

<script>
    $(document).ready(function() {
    $('#parent_id').select2();
    });
</script>
@endsection

