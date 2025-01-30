<div>
    <style>
        #mapa { height: 800px; width:90%;}
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Leaflet. Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>



    <h1>Camellón @if($camID=='0') Nuevo @else {{ $camID }}@endif</h1>


    <div class="row">
        <!-- Campus y Jardín -->
        <div class="form-group col-xs-10 col-sm-10 col-md-6">
            <label class="form-label">Campus: <red>*</red></label>
            <select wire:model.live="NvoJardin" class="form-select" style="width:100%;display:inline-block;" @if($camID != '0') disabled @endif>
                <option value="">Indicar un campus</option>
                @foreach ($jardines as $jar)
                    <option value="{{ $jar->ccam_id }}"> {{ $jar->cjar_name }} / {{ $jar->ccam_name }} </option>
                @endforeach
            </select>
            @error('NvoJardin')<error>{{ $message }}</error> @enderror
        </div>

        <!-- logo y nombre del campus-->
        <div class="form-group col-xs-2 col-sm-2 col-md-6">
            <!-- logo de campus -->
            @if($jardines->where('ccam_id',$NvoJardin)->value('cjar_logo') == '' )
                <img src="/avatar/jardines/default.png" style="width: 70px;">
            @elseif($NvoJardin != '')
                <img src="/avatar/jardines/{{ $jardines->where('ccam_id',$NvoJardin)->value('cjar_logo') }}" style="width: 70px;">
            @endif
            <!-- nombre de campus -->
            <span style="font-weight: bold; font-size:150%;vertical-align:center;">
                {{ $jardines->where('ccam_id',$NvoJardin)->value('ccam_name') }}
            </span>

            <!-- moverse entre camellones -->
            @if($camID != '0')
                <span style="float: right;font-size:200%;">
                    <i class="bi bi-caret-left-fill"></i>
                    &nbsp;
                    <i class="bi bi-caret-right-fill"></i>
                </span>
            @endif
        </div>

    </div>
    <div class="row">
        <!-- Nombre corto de camellón -->
        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <label class="form-label">Nombre corto del camellón <red>*</red> </label> <span class="PaClick" onclick="VerNoVer('Nombres','Camellones')">(ver nombres)</span>
            <input wire:model="NvoCamellon" type="text" class="form-control">
            @error('NvoCamellon')<error>{{ $message }}</error> @enderror
            <div id="sale_NombresCamellones" style="display:none">
                -- Ver nombres --
            </div>
        </div>

        <!-- Nombre largo camellón -->
        <div class="form-group col-xs-12 col-sm-12 col-md-8">
            <label class="form-label">Nombre del camellón <red>*</red></label>
            <input wire:model="Nvocamellonname" ype="text" class="form-control">
            @error('Nvocamellonname')<error>{{ $message }}</error> @enderror
        </div>
    </div>
    <div class="row">
        <!-- Nombre corto de la zona -->
        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <label class="form-label">Nombre corto de la zona</label>
            <input wire:model="Nvozona" type="text" class="form-control">
            @error('Nvozona')<error>{{ $message }}</error> @enderror
        </div>

        <!-- Nombre largo de la zona -->
        <div class="form-group col-xs-12 col-sm-12 col-md-8">
            <label class="form-label">Nombre de la zona</label>
            <input wire:model="Nvozonaname" type="text" class="form-control">
            @error('Nvozonaname')<error>{{ $message }}</error> @enderror
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <!-- -------------------------- Izquierda del mapa --------------------------------->
        <div class="col-xs-12 col-md-4 my-2">
            <!-- carga geojson -->
            <div class="form-group">
                <br>
                @if($NvoMapa =='')
                    <label class="form-label">GeoJson del camellón <red>*</red></label>
                    <input wire:model="Nvogeojsonfile" type="file" class="form-control">
                    @error('Nvogeojsonfile')<error>{{ $message }}</error>@enderror
                @endif
            </div>


            <!-- punto medio x -->
            <div class="form-group" style="width:45%; display:inline-block;">
                <label class="form-label">Centro X</label>
                <input wire:model.live="Nvoctrox" type="number" class="form-control">
            </div>

            <!-- punto medio Y -->
            <div class="form-group" style="width:45%; display:inline-block;">
                <label class="form-label">Centro Y</label>
                <input wire:model.live="Nvoctroy" type="number" class="form-control">
            </div>

            <!-- Zoom -->
            <div class="form-group" style="width:35%; display:inline-block;">
                <label class="form-label">Nivel de Zoom</label>
                <select wire:model.live="Nvozoom" class="form-select">
                    <option value="18">18 lejos</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23 cerca</option>
                    <option value="24">24</option>
                    <option value="25">25 Muy cerca</option>
                </select>
            </div>

            <!-- Botón para cambio de centro -->
            <div class="form-group" style="width:45%; display:inline-block;">
                @if($NvoMapa != '')
                    <button wire:click="CambiaCentro()" class="btn btn-{{ $botonCambiaCentro }}">
                        Cambiar centro
                    </button>
                @endif
            </div>

            <!-- color --->
            <div class="form-group" style="display:inline-block;">
                <label  class="form-label">Color</label><br>
                <input class="form-control form-control-color" type="color" style="width:60px">
            </div>

            <!-- Notas --->
            <div class="form-group" style=";">
                <label class="form-label">Notas</label>
                <textarea class="form-control"></textarea>
            </div>




            mapa:{{ $NvoMapa }}

            <div class="form-group m-4">
                @if($NvoMapa == '')
                    <button wire:click="VerMapa()" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Crear Camellón
                    </button>
                @else
                    <button wire:click="GuardaCamellon()" class="btn btn-warning">
                        <i class="bi bi-save"></i> Guardar camellón
                    </button>
                @endif

                <a href="/catalogo/camellones">
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Terminar
                    </button>
                </a>
            </div>

            <br><br>
            @if($NvoMapa !='')
                <div>
                    <button wire:click="BorrarMapa()" class="btn btn-secondary" wire:confirm="Vas a borrar un mapa de camellón. ¿Estás seguro? No se puede recuperar.">
                        <i class="bi bi-trash"></i> Borrar mapa
                    </button>
                </div>
            @endif
        </div>
<!-- ------------------------------ Mapa ------------------------------------------------ -->
        <div class="col-xs-12 col-md-8 my-4">
            @if($NvoMapa != '')
                <div id="mapa" wire:ignore style="padding:10rem;"></div>
            @endif
        </div>
    </div>
</div>



    <script>
        ///// Carga el mapa
        const mapa = VerMapaPropio();

        function VerMapaPropio(){
            ///// OJO require: mapaIzq, mapaDer, Zoom, X, Y, label
            var mapa = L.map('mapa').setView([{{ $Nvoctroy }}, {{ $Nvoctrox }}], {{ $Nvozoom }});

            /// CARGA ESTILO DEL POLÍGONOS
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

            /// CARGA POLÍGONOS Y ESTILO DE CAMELLONES DEL JARDÍN
            @if($camellones !='')
                @foreach ($camellones as $c)
                    //-- <!-- CAMELLON -->
                    var geojsonFeature1 = [{!! $c->cam_mapa  !!}];
                    L.geoJSON(geojsonFeature1,{style: poligonoTransp}).addTo(mapa)
                    .bindPopup('{{ $c->cam_id }})  {{ $c->cam_camellon }}<br><a href="/catalogo/camellon/{{ $c->cam_id }}">Editar</a>');
                @endforeach
            @endif




            ///// CARGA POLÍGONOS Y ESTILO DE CAMELLON DEL EJEMPLAR
            var geojsonFeature2 = [{!! $NvoMapa  !!}];
            L.geoJSON(geojsonFeature2,{style: poligonoVerde}).addTo(mapa);


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
            @this.set('Nvoctroy',e.latlng.lat);
            @this.set('Nvoctrox',e.latlng.lng);
            //Genera un marcador al hacer click
            L.marker(e.latlng).addTo(mapa)
        }
        mapa.on('click', onMapClick);
    });

    ///// Abre modal para label de foto
    $wire.on('EnviarAMapa',() => {
        const mapa = VerMapaPropio();

    });


</script>
@endscript


