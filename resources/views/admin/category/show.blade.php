@extends('layouts.admin')
@section('title','Categoría ' . $category->name)
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
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
            Detalles de categoría {{$category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">
                  <i class="far fa-futbol"></i>
                  {{$category->name}}
                </h4>
                <ul class="solid-bullet-list">
                  <li>
                    <h5>Descripción</h5>
                    <p class="text-muted">{{$category->description}}</p>
                  </li>
                </ul>

              </div>
              <div class="card-footer">
                
                      {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}
  
                      <a class="btn btn-outline-info" href="{{route('categories.edit', $category)}}">Editar</a>
  
                      {{-- <button type="submit" class="btn btn-danger btn-icon-text float-right">
                          Eliminar
                          <i class="btn-icon-append fas fa-trash-alt"></i>
                      </button> --}}
  
                      {!! Form::close() !!}
  
              </div>
            </div>
          </div>

        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Subcategorías</h4>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-icon-text mb-3" data-toggle="modal" data-target="#exampleModal">
                            Agregar 
                            <i class="btn-icon-append fas fa-plus"></i>
                        </button>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            {{-- <th>Acciones</th> --}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($subcategories as $subcategory)
                            <tr>
                                
                                <td>
                                    <a href="#" class="get_products" data-artid="{{$subcategory->id}}">{{$subcategory->name}}</a>

                                </td>
                                <td>{{$subcategory->description}}</td>
                                {{-- <td style="width: 50px;">
                                    <a class="jsgrid-button jsgrid-edit-button" href="{{route('categories.edit', [$category, $subcategory])}}" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['categories.destroy', $subcategory], 'method' => 'DELETE']) !!}

                                    

                                    <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                

                                    {!! Form::close() !!}
                                </td> --}}
                            </tr>
                               
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
          </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Productos</h4>
                </div>

                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                
                                <td>
                                    <a href="{{route('products.show', $product)}}">{{$product->name}}</a>
                                </td>
                                <td>{{$product->date}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->category->name}}</td>

                                @if ($product->status == 'Active')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                @endif

                                <td style="width: 50px;">
                                    {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE']) !!}
                                    <a class="jsgrid-button jsgrid-edit-button" href="{{route('products.edit', $product)}}"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                            type="submit" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{URL::previous()}}" class="btn btn-light">Atrás</a>
            </div>
          </div>
        </div>

    </div>    

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Agregar subcategoría</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
        <div class="modal-body">

            <input type="hidden" value="{{$category->id}}" name="parent_id">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" required></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                                    
            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Agregar</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/modal-demo.js') !!}

@if ($errors->any())
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
        });
    </script>
@endif

<script>
    $(function(){
        $('.get_products').click(function(){
            var elem = $(this);
            $.ajax({
                type: "GET",
                url: "/get_products_by_subcategory",
                data: "subcategory_id="+elem.attr('data-artid'),
                dataType:"json",
                success: function(data1){
                    console.log(data1);
                    $("#products-listing").dataTable().fnDestroy();
                    $("#products-listing").DataTable({
                        "data":data1.data,
                        "columns":[
                        {"data" : "id"},
                        {"data" : "name"},
                        {"data" : "sell_price"},  
                        {"data" : "stock"},
                        {"data" : "btn"}
                    ]
                    });
                }
            });
            return false;
        });
    });
</script>

@endsection
