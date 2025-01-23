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

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div id="mapa" wire:ignore></div>
            <div class="row">
                <!-- -------------------- Latitud y Longitud ------------------------------- -->
                <div class="form-group col-3">
                    <label>Longitud decimal Y <red>*</red></label>
                    <input wire:model="NvoY" type="number" class="form-control @error('NvoY') error @enderror">
                    @error('NvoY')<error>{{ $message }}</error>@enderror
                </div>
                <div class="form-group col-3">
                    <label>Latitud decimal X <red>*</red></label>
                    <input wire:model="NvoX" type="number" class="form-control @error('NvoX') error @enderror">
                    @error('NvoX')<error>{{ $message }}</error>@enderror
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
                    <input type="hidden" wire:model="NvoCampus">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Camellón ------------------------------- -->
                    <label>Camellón  <red>*</red></label>
                    <select wire:model="NvoCamellon" class="form-select @error('NvoCamellon') error @enderror" >
                        <option value="">Seleccionar</option>
                        @foreach ($NombreCamellones as $i)
                            <option value='{{ $i->cam_camellon }}'>{{ $i->cam_camellon }} &nbsp; &nbsp; [{{ $i->cjar_siglas }}: {{ $i->ccam_name }}]</option>
                        @endforeach
                    </select>
                    @error('NvoCamellon')<error>{{ $message }}</error>@enderror
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Label ------------------------------- -->
                    <label>Label (ID colecta) <red>*</red></label>
                    <input wire:model="NvoLabel" type="text" class="form-control @error('NvoLabel') error @enderror">
                    @error('NvoLabel')<error>{{ $message }}</error>@enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-8 col-md-4">
                    <!-- -------------------- Nombre común ------------------------------- -->
                    <label>Nombre común</label>
                    <input wire:model="NvoComname" type="text" class="@error('NvoComname') error @enderror form-control">
                    @error('NvoComname')<error>{{ $message }}</error>@enderror
                </div>

                <div class="form-group col-sm-4 col-md-2">
                    <!-- -------------------- Lengua ------------------------------- -->
                    <label>Lengua</label>
                    <select wire:model="NvoLengua" class="@error('') error @enderror form-select">
                        @foreach ($lenguas as $len)
                            <option value='{{ $len->clen_id }}'>{{ $len->clen_nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <!-- -------------------- Nombre Científico ------------------------------- -->
                    <label>Nombre científico (V.1)</label>
                    <input wire:model="NvoSciname" type="text" class="@error('NvoSciname') error @enderror form-control">
                    @error('NvoSciname')<error>{{ $message }}</error>@enderror
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
                    <select wire:model="Especie" id="Especie" class="@error('Especie') error @enderror select2 form-select" id="especie" style="width:100%; display:inline-block;">
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
                            <div>
                                <label>Ubicación del ejemplar</label><br>
                                <a href="/cargaMasiva/{{ $Nvofotolugar }}" target="new" class="nolink">
                                    <img src="/cargaMasiva/{{ $Nvofotolugar }}" style="max-height:200px;">
                                </a>
                            </div>
                            <!-- acciones de fotolugar -->
                            <div>
                                @if($Nvofotolabellugar == '')
                                    <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('lugar')"><red>*</red></i>
                                    @error('Nvofotolabellugar')<error>{{ $message }}</error> @enderror
                                @else
                                    <div class="etiqueta">
                                        {{ $Etiquetas->where('cimg_id',$Nvofotolabellugar)->value('cimg_name') }}
                                        <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('lugar')" wire:confirm="¿Eliminar la etiqueta?"></i>
                                    </div>
                                @endif
                                <i class="bi bi-trash mx-2 PaClick" wire:click="BorrarFoto('lugar')" wire:confirm="¿Quieres borrar la imagen?"></i>
                            </div>
                        </div>
                    @endif
                    <?php $cont=0; ?>
                    <!-- ---------------- Foto 1 ------------------>
                    @if($Nvofoto1 != '' )
                        <div style="display:inline-block;" class="p-3;">
                            <div>
                                <?php $cont++; ?>
                                <a href="/cargaMasiva/{{ $Nvofoto1 }}" target="new" class="nolink">
                                    <img src="/cargaMasiva/{{ $Nvofoto1 }}" style="max-height:200px;">
                                </a>

                            </div>
                            <!-- acciones de foto1 -->
                            <div>
                                @if($Nvofotolabel1 == '')
                                    <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('1')"><red>*</red></i>
                                    @error('Nvofotolabel1')<error>{{ $message }}</error> @enderror
                                @else
                                    <div class="etiqueta">
                                        {{ $Etiquetas->where('cimg_id',$Nvofotolabel1)->value('cimg_name') }}
                                        <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('1')" wire:confirm="¿Eliminar la etiqueta?"></i>
                                    </div>
                                @endif
                                <i class="bi bi-trash icono-simple PaClick" wire:click="BorrarFoto('1')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continuar?"></i>
                            </div>
                        </div>
                    @endif

                    <!-- ---------------- Foto 2 ------------------>
                    @if($Nvofoto2 != '' )
                        <div style="display:inline-block;" class="p-3;" >
                            <div>
                                <?php $cont++; ?>
                                <a href="/cargaMasiva/{{ $Nvofoto2 }}" target="new" class="nolink">
                                    <img src="/cargaMasiva/{{ $Nvofoto2 }}" style="max-height:200px;">
                                </a>
                            </div>
                            <!-- acciones de foto2 -->
                            <div>
                                @if($Nvofotolabel2 == '')
                                    <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('2')"><red>*</red></i>
                                    @error('Nvofotolabel2')<error>{{ $message }}</error> @enderror
                                @else
                                    <div class="etiqueta">
                                        {{ $Etiquetas->where('cimg_id',$Nvofotolabel2)->value('cimg_name') }}
                                        <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('2')" wire:confirm="¿Eliminar la etiqueta?"></i>
                                    </div>
                                @endif
                                <i class="bi bi-trash icono-simple PaClick" wire:click="BorrarFoto('2')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continuar?"></i>
                            </div>
                        </div>
                    @endif

                    <!-- ---------------- Foto 3 ------------------>
                    @if($Nvofoto3 != '' )
                        <div style="display:inline-block;" class="p-3;" >
                            <div>
                                <?php $cont++; ?>
                                <a href="/cargaMasiva/{{ $Nvofoto3 }}" target="new" class="nolink">
                                    <img src="/cargaMasiva/{{ $Nvofoto3 }}" style="max-height:200px;">
                                </a>
                            </div>
                            <!-- acciones de foto3 -->
                            <div>
                                @if($Nvofotolabel3 == '')
                                    <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('3')"><red>*</red></i>
                                    @error('Nvofotolabel3')<error>{{ $message }}</error> @enderror
                                @else
                                    <div class="etiqueta">
                                        {{ $Etiquetas->where('cimg_id',$Nvofotolabel3)->value('cimg_name') }}
                                        <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('3')" wire:confirm="¿Eliminar la etiqueta?"></i>
                                    </div>
                                @endif
                                <i class="bi bi-trash icono-simple PaClick" wire:click="BorrarFoto('3')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                            </div>
                        </div>
                    @endif

                    <!-- ---------------- Foto 4 ------------------>
                    @if($Nvofoto4 != '' )
                        <div style="display:inline-block;" class="p-3;" >
                            <div>
                                <?php $cont++; ?>
                                <a href="/cargaMasiva/{{ $Nvofoto4 }}" target="new" class="nolink">
                                    <img src="/cargaMasiva/{{ $Nvofoto4 }}" style="max-height:200px;">
                                </a>
                            </div>
                            <!-- acciones de foto4-->
                            <div>
                                @if($Nvofotolabel4 == '')
                                    <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('4')"><red>*</red></i>
                                    @error('Nvofotolabel4')<error>{{ $message }}</error> @enderror
                                @else
                                    <div class="etiqueta">
                                        {{ $Etiquetas->where('cimg_id',$Nvofotolabel4)->value('cimg_name') }}
                                        <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('4')" wire:confirm="¿Eliminar la etiqueta?"></i>
                                    </div>
                                @endif
                                <i class="bi bi-trash icono-simple PaClick" wire:click="BorrarFoto('4')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                            </div>
                        </div>
                    @endif
                    <!-- ---------------- Foto 5 ------------------>
                    @if($Nvofoto5 != '' )
                    <div style="display:inline-block;" class="p-3;" >
                        <div>
                            <?php $cont++; ?>
                            <a href="/cargaMasiva/{{ $Nvofoto5 }}" target="new" class="nolink">
                                <img src="/cargaMasiva/{{ $Nvofoto5 }}" style="max-height:200px;">
                            </a>
                        </div>
                        <!-- acciones de foto 5-->
                        <div>
                            @if($Nvofotolabel5 == '')
                            <i class="bi bi-tag mx-2 PaClick" wire:click="AbreModalNuevoLabel('5')"><red>*</red></i>
                            @error('Nvofotolabel5')<error>{{ $message }}</error> @enderror
                            @else
                            <div class="etiqueta">
                                {{ $Etiquetas->where('cimg_id',$Nvofotolabel5)->value('cimg_name') }}
                                <i class="bi bi-x-lg mx-1 PaClick"  wire:click="BorrarLabel('5')" wire:confirm="¿Eliminar la etiqueta?"></i>
                            </div>
                            @endif
                            <i class="bi bi-trash icono-simple PaClick" wire:click="BorrarFoto('5')" wire:confirm="Estás por borrar definitivamente la imagen. ¿Quieres continura?"></i>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-12 my-3">
                    <form  method="POST" enctype="multipart/form-data">
                        <!-- ---------------- Subir nueva foto de ubicación------------------>
                        @if($Nvofotolugar=='' or is_null($Nvofotolugar))
                            <div style="display:inline-block;" class="form-group py-3;">
                                <label> Foto de la ubicación del ejemplar</label> <br>
                                <input wire:model="SubeFotoLugar" type="file" class="@error('SubeFotoLugar') error @enderror form-control my-2" style="width:400px; display:inline-block;">

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
                                <input wire:model="SubeFotoPlanta" type="file" class="@error('SubeFotoPlanta') error @enderror form-control my-2" style="width:400px; display:inline-block;">
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
                        <label>Ìcono <red>*</red></label><br>
                        <select wire:model.live="NvoIcono" class="@error('NvoIcono') error @enderror form-select" style="width:80%;display:inline-block;">
                            {{-- <option value="">Ningún ícono</option> --}}
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
                        <textarea wire:model="NvoObsejemplar" class="@error('NvoObsejemplar') error @enderror form-control">{{ $base->imp_obsejemplar }}</textarea>
                    </div>
                    <!-- ----------------------- Obs. ubicación --------------------------------- -->
                    <div class="form-group my-3">
                        <label>Observaciones a la ubicación</label>
                        <textarea wire:model="NvoObsubica" class="@error('NvoObsubica') error @enderror form-control">{{ $base->imp_obsubica }}</textarea>
                    </div>
                    <!-- ----------------------- Obs. captura --------------------------------- -->
                    <div class="form-group my-3">
                        <label>Observaciones durante la captura</label>
                        <textarea wire:model="NvoObscaptura" class="@error('NvoObscaptura') error @enderror form-control">{{ $base->imp_obscaptura }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 my-4 center" style="width:100%;">
                <button wire:click="GuardarDatos()" type="button" class="btn btn-primary">
                    Guardar Cambios
                </button>
            </div>
            <div class="col-12 my-4 center" style="width:100%;">
                <button wire:click="IncorporarAcoleccion()" {{-- wire:confirm="¿Ya guardaste los cambios?\n Estás por ingresar un nuevo registro a la colección y ya no podrás regresar. ¿Quieres continuar?" --}} type="button" class="btn btn-warning" style="float: right;">
                    Incorporar Registro <br> a colección
                </button>
                @if($errors->any()) <error style="float: right;margin:1rem;"> Se detectaron errores<br>en el formulario,<br> favor de revisar </error> @enderror
            </div>
        </div>
    </div>


    <!-- ------------------------------------------------------------- MODAL NUEVA ETIQUETA -------------------------------------------------------------------------->
    <!-- ------------------------------------------------------------- MODAL NUEVA ETIQUETA -------------------------------------------------------------------------->
    <!-- ------------------------------------------------------------- MODAL NUEVA ETIQUETA -------------------------------------------------------------------------->
    <!-- ------------------------------------------------------------- MODAL NUEVA ETIQUETA -------------------------------------------------------------------------->
    <div class="modal" tabindex="-1" role="dialog" id="ModalLabel" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar etiqueta a imagen {{ $FotoLabelCambiante }}</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ìcono</label><br>
                        <select wire:model.live="NuevoLabel" class="@error('NuevoLabel') error @enderror form-select">
                            @foreach ($Etiquetas as $eti)
                                <option value="{{ $eti->cimg_id }}"> {{ $eti->cimg_name }}</option>
                            @endforeach
                        </select>
                        @error('NuevoLabel') <error> {{ $message }}</error>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="GuardaNuevaEtiqueta()">Save changes</button>
                    <button type="button" class="btn btn-secondary" wire:click="CierraModalNuevoLabel()" data-dismiss="modal">Close</button>
                </div>
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

        ///// CARGA PUNTOS DE REGISTROS PREEXISTENTES EN SISTEMA
        @foreach ($puntoscolect as $punto)

            var LeafIcon = L.Icon.extend({
                options: {
                    iconSize: [25,25],
                    //iconAnchor: [10,10]
                    // shadowUrl: 'leaf-shadow.png',
                    // iconSize:     [38, 95],
                    // shadowSize:   [50, 64],
                    // iconAnchor:   [22, 94],
                    // shadowAnchor: [4, 62],
                    // popupAnchor:  [-3, -76]

                }
            });
            var marcaPropia = new LeafIcon({iconUrl: '/iconos/{{ $punto->icon_file }}'})
            var marca = L.marker([{{$punto->sig_y}},{{$punto->sig_x}}],{icon:marcaPropia}).addTo(mapa).bindPopup("--EJEMPLAR--<BR><b>ID {{ $punto->sig_plid }}</b><BR> {{ 'sig_identificador' }}");;
        @endforeach

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

    ///// Abre modal para label de foto
    $wire.on('AbreModalLabelFoto',() => {
        $('#ModalLabel').modal('show');
    });

     ///// Abre modal para label de foto
     $wire.on('CierraModalLabelFoto',() => {
        $('#ModalLabel').modal('hide');
    });

</script>
@endscript

