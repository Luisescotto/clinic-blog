@extends('layouts.admin')
@section('title', 'Editar subcategorías')
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
                Editar subcategoría {{$subcategory->name}}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Subcategoría</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        {!! Form::model($subcategory, ['route' => ['subcategories.update', $category, $subcategory], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$subcategory->name}}" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="10">{{$subcategory->description}}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
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
@endsection


