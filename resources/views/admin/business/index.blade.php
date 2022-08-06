@extends('layouts.admin')
@section('title','Gestión de empresa')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

</style>
{!! Html::style('fileinput/css/fileinput.min.css') !!}
@endsection
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal-2">
      <span class="btn btn-primary"><i class="far fa-edit"></i> Modificar información</span>
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
            Gestión de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de empresa</li>
            </ol>
        </nav>
    </div>

    <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body d-flex flex-column">
              <h4 class="card-title">
                <i class="fas fa-chart-pie"></i>
                Información de la empresa
              </h4>

              <div class="flex-grow-1 d-flex flex-column justify-content-between">
                <strong>Nombre</strong>

                        <p class="text-muted">
                            {{$business->name}}
                        </p>
                        <strong>Descripción</strong>

                        <p class="text-muted">
                            {{$business->description}}
                        </p>
                        <strong>Dirección</strong>

                        <p class="text-muted">
                            {{$business->address}}
                        </p>

                        <strong>Correo electrónico</strong>

                        <p class="text-muted">{{$business->email}}</p>
                        
                            
                        <strong>Logo</strong><br>
                            
                            
                        <img style="width:108px ; height:108px ;" src="{{asset($business->logo)}}" alt="logo">
                        
              </div>
              
            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h4 class="card-title">
                  <i class="fas fa-chart-pie"></i>
                  Información de contacto
                </h4>
  
                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                          
                          <strong>Contáctanos</strong>
                          <p class="text-muted">
                              {{$business->contact_text}}
                          </p>

                          <strong>Horario de atención</strong>
                          <p class="text-muted">
                              {{$business->hours_of_operation}}
                          </p>

                          <strong>Número telefónico</strong>
                          <p class="text-muted">
                              {{$business->phone}}
                          </p>

                          <strong>Enlace de Google Maps</strong>
                          <p class="text-muted">
                              {{$business->google_map_link}}
                          </p>
                          
                </div>
                
              </div>
            </div>
          </div>
      </div>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body d-flex flex-column">
              <h4 class="card-title">
                <i class="fas fa-chart-pie"></i>Ubicación de la empresa</h4>

                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                
                        <div class="map-container">
                          <div id="propia-map-theme" class="google-map"></div>
                        </div>     
              
                </div>
              
            </div>
          </div>
        </div>

    </div>

</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($business,['route'=>['business.update',$business], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$business->name}}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description"
                                rows="3" required>{{$business->description}}</textarea>
                        </div>
        
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$business->email}}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$business->address}}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contact_text">Contáctanos</label>
                            <textarea class="form-control" name="contact_text" id="contact_text"
                                rows="3" required>{{$business->contact_text}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="hours_of_operation">Horario de atención</label>
                            <textarea class="form-control" name="hours_of_operation" id="hours_of_operation"
                                rows="3" required>{{$business->hours_of_operation}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="{{$business->phone}}" required>
                        </div>

                        <div class="form-group">
                            <label for="google_map_link">Enlace de Google Maps</label>
                            <input type="url" class="form-control" name="google_map_link" id="google_map_link" value="{{$business->google_map_link}}" required>
                        </div>
                    </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="kv-avatar">
                                  <label for="file">Logo de la empresa</label>
                                  <div class="file-loading">
                                      <input id="file" name="file" type="file">
                                  </div>
                              </div>
                            </div>
                        </div>
                    

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ubicación de la empresa</label>
                            <div id="map_canvas" style="height:350px">

                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="latitude" id="latitude" value="{{$web_company->latitude}}">
                <input type="hidden" name="length" id="longitude" value="{{$web_company->length}}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDvk97uNt2lr1VVqBcdv53XiO2qJRp_uyA') !!}
{!! Html::script('map-icons/dist/js/map-icons.js') !!}


{{-- <script src="melody/js/google-maps.js"></script> --}}
<script>
    function init(){
        var mapOption = {
            center: new google.maps.LatLng(<?php echo '' . $business->latitude . ''; ?>, <?php echo '' . $business->length . ''; ?>),
            zoom: 19
        };

        var map = new google.maps.Map(document.getElementById("propia-map-theme"),mapOption);
        var marker = new google.maps.Marker({
            position: {lat:<?php echo ''. $business->latitude .''; ?>, lng:<?php echo ''. $business->length .''; ?>  },
            title: "<?php echo '' . $business->name . ''; ?>",
            icon: {
                path: mapIcons.shapes.MAP_PIN,
                fillColor: '#05a503',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0
            },
            map_icon_label: '<span class="map-icon map-icon-grocery-or-supermarket"></span>'
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', init);
</script>

<script>
    var vMarker
    var map

    map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 19,
            center: new google.maps.LatLng({{$web_company->latitude}},{{$web_company->length}}),
            
    });
    vMarker = new google.maps.Marker({
        position: new google.maps.LatLng({{$web_company->latitude}},{{$web_company->length}}),
        draggable: true
    });
    google.maps.event.addListener(vMarker, 'dragend', function(evt){
        $("#latitude").val(evt.latLng.lat().toFixed(6));
        $("#longitude").val(evt.latLng.lng().toFixed(6));
        map.panTo(evt.latLng);
    });

    map.setCenter(vMarker.position);
    vMarker.setMap(map);

    $("#txtCiudad, #txtEstado, #txtDireccion").change(function(){
        movePin();
    });

    function movePin(){
        var geocoder = new google.maps.Geocoder();
        var textSelectM = $("#txtCiudad").text();
        var textSelectE = $("#txtEstado").val();
        var inputAddress = $("#txtDireccion").val() + ' ' + textSelectM + ' ' + textSelectE;

        geocoder.geocode({
            "address": inputAddress
        }, function(results, status){
            if(status == google.maps.GeocoderStatus.OK){
                vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(),
                results[0].geometry.location.lng()));
                map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(),
                results[0].geometry.location.lng()));
                $("#txtLat").val(results[0].geometry.location.lat());
                $("#txtLng").val(results[0].geometry.location.lng());
            }
        });
    }
</script>

{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}

<script>
    $(document).ready(function() {
        $("#file").fileinput({
                language: "es",
                theme: "fas",
                browseOnZoneClick: true,
                defaultPreviewContent: "<img src='{{$business->logo}}' style='width: 100%'>",
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
