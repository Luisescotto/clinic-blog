@extends('layouts.admin')
@section('title', 'Registrar categorías')
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
                Registrar categoría
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar Categoría</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Categoría</h4>
                        </div>

                        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                       
                        <div class="form-group">
                            
                          <label for="type">Módulo</label>
                          <select class="form-control" name="type" id="type" onchange="showInp()">
                            <option selected disabled>--módulo de la categoría--</option>
                            <option value="Post">Publicaciones</option>
                            <option value="Product">Productos</option>
                          </select>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                                </div>
                            </div>
    
                            <div class="col">
                                <div class="form-group">
                                    <div id="icon_div">
                                        <label for="icon">Icono</label>
                                        <select class="form-control" name="icon" id="icon">
                                            <option value="" selected>--seleccione un ícono--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                        </div>


                        
                        <div class="form-group">
                            <div id="superior_div">
                                <label for="parent_id">Superior</label>
                                <select class="select2" name="parent_id" id="parent_id" style="width: 100%">
                                  <option value="" selected>--ninguna--</option>
      
                                    @foreach ($categories as $category)
                                   
                                    <option value="{{$category->id}}">{{$category->name}}</option>
      
                                    @endforeach
      
                                </select>
                                <small id="helpId" class="text-muted">Seleccione una categoría padre si desea crear una subcategoría.</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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

