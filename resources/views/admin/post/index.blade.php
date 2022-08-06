@extends('layouts.admin')
@section('title', 'Gestion de Publicaciones')
@section('styles')
    <style type="text/css">
        .unstyled-button{
            border: none;
            padding: 0;
            background: none;
            cursor: pointer;
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
                Publicaciones
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Publicaciones</h4>
                            {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  {{-- <a href="{{route('posts.create')}}" class="dropdown-item">Agregar</a> --}}
                                  
                                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal-2">Agregar</button>

                                </div>
                              </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                {{-- 'title',
                                'slug',
                                'excerpt',
                                'body',
                                'iframe',
                                'published_at', --}}
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Título</th>
                                    <th>Estado</th>
                                    <th>Fecha de publicación</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a target="_blank" href="{{route('web.blog_details', $post)}}">{{$post->title}}</a>
                                        </td>
                                        <td>
                                            <label class="badge badge-{{$post->post_status()['color']}} badge-pill">
                                                {{$post->post_status()['text']}}
                                            </label>
                                        </td>
                                        <td>
                                            @if (isset($post->published_at))
                                                {{$post->published_at->format('d-m-Y H:i')}}
                                            @endif
                                        </td>
                                        @if ($post->category)
                                            <td>{{$post->category->name}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        

                                        <td style="width: 50px;">
                                            {!! Form::open(['route' => ['posts.destroy', $post], 'method' => 'DELETE', 'class' => 'form_delete']) !!}
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('posts.edit', $post)}}"
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
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Crear publicación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['route'=>'posts.store', 'method'=>'POST']) !!}
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Título de la publicación</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
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
@endsection

