@section('title')
Carga Masiva de plantas
@endsection
@section('cintillo')
    Carga masiva de datos -> revisión
@endsection

<div>
    <style>
        #mapa { height: 800px; width:90%;}
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Leaflet. Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <h1>Revisión de carga de datos de plantas</h1>
S
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div id="mapa" wire:ignore></div>
            <div class="row">
                <!-- -------------------- Latitud y Longitud ------------------------------- -->
                <div class="form-group col-3">
                    <label>Longitud decimal Y</label>
                    <input wire:model="NvoY" type="number" class="form-control">
                    @error('NvoY')<error>{{ $messge }}</error>@enderror
                </div>
                <div class="form-group col-3">
                    <label>Latitud decimal X</label>
                    <input wire:model="NvoX" type="number" class="form-control">
                    @error('NvoX')<error>{{ $messge }}</error>@enderror
                </div>
                <!-- -------------------- Capturar coords ------------------------------- -->
                <div class="form-group col-5">
                    <botton wire:click="ActivaMuevePlanta()" class="btn btn-{{ $BotonMoverPlanta }}" >
                        <div style="font-size:50%;">Mover planta</div>
                        <img src="{{asset('iconos/IconoMoverPlanta.png')}}" style="height: 30px;">
                    </botton>


                    <h2 class="my-4" style="display:inline;">
                        ID:
                        <a href="/importaPlantas_ver/{{ $PrevID }}" class="nolink">
                            <i class="bi bi-caret-left-fill"></i>
                        </a>
                        {{ $base->imp_id }}
                        <a href="/importaPlantas_ver/{{ $NextID }}" class="nolink">
                            <i class="bi bi-caret-right-fill"></i>
                        </a>
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="row">
                <!-- -------------------- Jardín y Campus ------------------------------- -->
                <div class="col-6" style="font-size: 140%;">
                    <b>Jardín:</b> {{ $base->cjar_nombre }}
                </div>
                <div class="col-6" style="font-size: 140%;">
                    <b>Campus:</b> {{ $base->ccam_nombre }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Camellón ------------------------------- -->
                    <label>Camellón </label>
                    <select wire:model="NvoCamellon" class="form-select" >
                        <option value="">Seleccionar</option>
                        @foreach ($NombreCamellones as $i)
                            <option value='{{ $i->cam_camellon }}'>{{ $i->cam_camellon }} &nbsp; &nbsp; [{{ $i->cjar_siglas }}: {{ $i->ccam_name }}]</option>
                        @endforeach
                    </select>
                    @error('NvoCamellon')<error>{{ $messge }}</error>@enderror
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Label ------------------------------- -->
                    <label>Label (ID colecta)</label>
                    <input wire:model="NvoLabel" type="text" class="form-control">
                    @error('NvoLabel')<error>{{ $messge }}</error>@enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Nombre común ------------------------------- -->
                    <label>Nombre común</label>
                    <input wire:model="NvoComname" type="text" class="form-control">
                    @error('NvoComname')<error>{{ $messge }}</error>@enderror
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Nombre Científico ------------------------------- -->
                    <label>Nombre científico (V.1)</label>
                    <input wire:model="NvoSciname" type="text" class="form-control">
                    @error('NvoSciname')<error>{{ $messge }}</error>@enderror
                </div>
            </div>

            <div class="row">
                <!-- ---------------- Género supuesto Kew ------------------>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="MiGenero">Buscar Género:</label><br>
                    <input wire:model="Genero" type="text" class="form-control @error('Genero') error @enderror" id="MiGenero" style="width:70%;display:inline-block;">
                    @error('Genero') <error>{{$mesagge}} @enderror
                    <button type="button" wire:click="BuscaEspecies()" class="btn btn-secondary btn-sm">Buscar</button>
                </div>

                <!-- ---------------- Especie supuesta Kew ------------------>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="MiGenero">Definir especie (V.2 <i>sensu</i> Kew):</label><br>
                    <select wire:model="Especie" id="Especie" class="select2 form-select" id="especie" style="width:100%; display:inline-block;">
                        @if($nespecies < 1)
                            @if($Genero == '')
                                <option value="">Debes escribir un género antes</option>
                            @else
                                <option value="">{{$Genero}} no es un género válido</option>
                            @endif
                        @else
                            <option value="">Indica la especie de {{$Genero}}</option>
                        @endif

                        @foreach ($especies as $i)
                            <option value="{{$i->ckew_taxonid}}">{{$i->ckew_scientfiicname}} [{{$i->ckew_family}}]</option>
                        @endforeach
                    </select>
                </div>


            </div>

            <div class="row">
                <div class="col-12 my-3">
                    <!-- ---------------- Foto lugar ------------------>
                    @if($Nvofotolugar != '' )
                        <div style="display:inline-block;" class="py-3;" >
                            <label>Ubicación del ejemplar</label><br>
                            <a href="/cargaMasiva/{{ $Nvofotolugar }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofotolugar }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('lugar')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif
                    <?php $cont=0; ?>
                    <!-- ---------------- Foto 1 ------------------>
                    @if($Nvofoto1 != '' )
                        <div style="display:inline-block;" class="px-1;">
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto1 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto1 }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('1')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif

                    <!-- ---------------- Foto 2 ------------------>
                    @if($Nvofoto2 != '' )
                        <div style="display:inline-block;" class="py-3;" >
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto2 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto2 }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('2')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif

                    <!-- ---------------- Foto 3 ------------------>
                    @if($Nvofoto3 != '' )
                        <div style="display:inline-block;" class="py-3;" >
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto3 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto3 }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('3')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif

                    <!-- ---------------- Foto 4 ------------------>
                    @if($Nvofoto4 != '' )
                        <div style="display:inline-block;" class="py-3;" >
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto4 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto4 }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('4')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif
                </div>
                <div class="col-12 my-3">
                    <!-- ---------------- Foto 5 ------------------>
                    @if($Nvofoto5 != '' )
                        <div style="display:inline-block;" class="py-3;" >
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto5 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto5 }}" style="max-height:200px;">
                            </a>
                            <i class="bi bi-trash icono-simple" style="vertical-align:bottom;cursor: pointer;" wire:click="BorrarFoto('5')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    @endif

                    <form  method="POST" enctype="multipart/form-data">
                        <!-- ---------------- Subir nueva foto de ubicación------------------>
                        @if($Nvofotolugar=='' or is_null($Nvofotolugar))
                            <div style="display:inline-block;" class="form-group py-3;">
                                <label> Foto de la ubicación del ejemplar</label> <br>
                                <input wire:model="SubeFotoLugar" type="file" class="form-control my-2" style="width:400px; display:inline-block;">

                                <button wire:click="cargaFotoLugar()" type="button" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-camera icono-simple"><i class="bi bi-plus"></i></i> Agregar
                                </button>
                                @error('SubeFotoLugar')<error>{{ $message }}</error>@enderror
                            </div>
                        @endif
                        <!-- ---------------- Subir nueva foto de planta------------------>
                        @if($cont < 5)
                            <div style="display:inline-block;" class="form-group py-3;" >
                                <label>Foto del ejemplar</label><br>
                                <input wire:model="SubeFotoPlanta" type="file" class="form-control my-2" style="width:400px; display:inline-block;">
                                <button wire:click="cargaFotoPlanta()" type="button" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-camera icono-simple"><i class="bi bi-plus"></i></i> Agregar
                                </button>
                                @error('SubeFotoPlanta')<error>{{ $message }}</error>@enderror
                            </div>
                        @endif
                    </form>

                </div>
            </div>

            <div class="row">
                <!-- ----------------------- FLAGS ------------------------------------- -->
                <div class="form-group col-sm-12 col-md-7">

                    <div style="display:inline-block;">
                        <i class="@if($flag1 != '') bi bi-flag-fill @else bi bi-flag @endif">1</i>
                        <input wire:model="flag1" type="number" class="form-control" style="width:80px;">
                    </div>
                    <div style="display:inline-block;">
                        <i class="@if($flag2 != '') bi bi-flag-fill @else bi bi-flag @endif">2</i>
                        <input wire:model="flag2" type="number" class="form-control" style="width:80px;">
                    </div>
                    <div style="display:inline-block;">
                        <i class="@if($flag3 != '') bi bi-flag-fill @else bi bi-flag @endif">3</i>
                        <input wire:model="flag3" type="number" class="form-control" style="width:80px;">
                    </div>
                    <div style="display:inline-block;">
                        <i class="@if($flag4 != '') bi bi-flag-fill @else bi bi-flag @endif">4</i>
                        <input wire:model="flag4" type="number" class="form-control" style="width:80px;">
                    </div>
                    <div style="display:inline-block;">
                        <i class="@if($flag5 != '') bi bi-flag-fill @else bi bi-flag @endif">5</i>
                        <input wire:model="flag5" type="number" class="form-control" style="width:80px;">
                    </div>
                </div>

                <div class="col-sm-12 col-md-5">
                    <!-- ----------------------- ICONOS ------------------------------------- -->
                    <div class="form-group">
                        <label>Ìcono</label><br>
                        <select wire:model.live="NvoIcono" class="form-select" style="width:80%;display:inline-block;">
                            <option value="">Ningún ícono</option>
                            @foreach ($iconos as $icon)
                                <option value="{{ $icon->icon_id }}"> {{ $icon->icon_nombre }}</option>
                            @endforeach
                        </select>
                        @if($NvoIcono != '')
                            <img src="/iconos/{{ $iconos->where('icon_id',$NvoIcono)->value('icon_file') }}" style="width:40px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12">
                    <!-- ----------------------- Obs. ejemplar --------------------------------- -->
                    <div class="form-group my-3">
                        <label>Observaciones al ejemplar</label>
                        <textarea wire:model="NvoObsejemplar" class="form-control">{{ $base->imp_obsejemplar }}</textarea>
                    </div>
                    <!-- ----------------------- Obs. ubicación --------------------------------- -->
                    <div class="form-group my-3">
                        <label>Observaciones a la ubicación</label>
                        <textarea wire:model="NvoObsubica" class="form-control">{{ $base->imp_obsubica }}</textarea>
                    </div>
                    <!-- ----------------------- Obs. captura --------------------------------- -->
                    <div class="form-group my-3">
                        <label>Observaciones durante la captura</label>
                        <textarea wire:model="NvoObscaptura" class="form-control">{{ $base->imp_obscaptura }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 my-4 center" style="width:100%;">
                <button wire:click="GuardarDatos()" type="button" class="btn btn-primary">
                    Guardar Cambios
                </button>
            </div>
            <div class="col-12 my-4 center" style="width:100%;">
                <button wire:click="IncorporarAcoleccion()" wire:confirm="¿Ya guardaste los cambios?\n Estás por ingresar un nuevo registro a la colección y ya no podrás regresar. ¿Quieres continuar?" type="button" class="btn btn-warning" style="float: right;">
                    Incorporar Registro <br> a colección
                </button>
            </div>

        </div>

    </div>

</div>



<script>
    ///// Carga el mapa
    const mapa = VerMapaPropio('mapa','blue','.1');

    function VerMapaPropio(IDreceptor){
        ///// OJO require: mapaIzq, mapaDer, Zoom, X, Y, label
        var mapa = L.map('mapa').setView([{{ $base->imp_y }}, {{ $base->imp_x }}], {{ 21 }});

        ///// CARGA ESTILO DEL POLÍGONOS
        function poligonoTransp(feature){
            return{
                fillColor: 'transparent',
                weight: 0.5,
                opacity: 1,
                color: 'black',
                dashArray: '1',
                fillOpacity: 0.7
            }
        }
        function poligonoVerde(feature){
            return{
                fillColor: '#919C1B',
                weight: 0.5,
                opacity: 1,
                color: 'gray',
                dashArray: '1',
                fillOpacity: 0.7
            }
        }

        ///// CARGA POLÍGONOS Y ESTILO DE CAMELLONES DEL JARDÍN
        var geojsonFeature1 = [{!! $camellones  !!}];
        L.geoJSON(geojsonFeature1,{style: poligonoTransp}).addTo(mapa);

        ///// CARGA POLÍGONOS Y ESTILO DE CAMELLON DEL EJEMPLAR
        var geojsonFeature2 = [{!! $base->cam_mapa  !!}];
        L.geoJSON(geojsonFeature2,{style: poligonoVerde}).addTo(mapa);//.bindPopup("Camellón {{ $base->cam_camellon }}");

        ///// CARGA PUNTOS DE FONDO
        @foreach ($puntos as $punto)
            //<!-- PUNTO: {{ $punto }} -->
            L.circle( [{{$punto->imp_y}},{{$punto->imp_x}}], {
                stroke: false,
                color: 'black',
                fillColor: 'black',
                fillOpacity: 0.5,
                opacity: 0.6,
                radius: 0.2
            }).addTo(mapa).bindPopup("({{ $punto->imp_id }}) <b>{{ $punto->imp_label }}</b> <br>  <i>{{ $punto->imp_sciname }}</i><br>{{ $punto->imp_comname }}<br><a href='/importaPlantas_ver/{{ $punto->imp_id }}'><i class='bi bi-pencil-square'></i> Editar</a>");
        @endforeach

        ///// CARGA PUNTO DEL EJEMPLAR
        var circlePrincipal = L.circle([{{$base->imp_y}},{{$base->imp_x}}], {
            color: 'black',
            weight: 1,
            fillColor: 'red',
            opacity: 0.7,
            fillOpacity: 0.5,
            radius: 0.5,
        }).addTo(mapa).bindPopup("Ejemplar en revisión<br>ID {{ $base->imp_id }}, <b>{{ $base->imp_label }}</b>");

        return mapa
    }

</script>

@script
<script>
    ///// Inicia la captura de coordenadas del mapa (evento de click en mapa)
    $wire.on('CapturaCoordenadas', () => {
            // alert('Haz click en el nuevo sitio sobre el mapa.\n(Debe ser un sitio sin planta)');
            function onMapClick(e) {
                //alert("Coordenadas lat: " + e.latlng.lat + " lng: " + e.latlng.lng );
                @this.set('NvoY',e.latlng.lat);
                @this.set('NvoX',e.latlng.lng);
                //Genera un marcador al hacer click
                L.marker(e.latlng).addTo(mapa)
            }
            mapa.on('click', onMapClick);
        });
</script>
@endscript

