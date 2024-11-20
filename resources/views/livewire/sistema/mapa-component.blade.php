<div>
@section('title') 
Mapa
@endsection

@section('meta-description')
Mapa del Jardín
@endsection


@section('banner')
banner-actividades
@endsection


@section('banner-title') 
Mapa
@endsection

@section('main-superior')
@endsection


@section('main-inferior')
@endsection


<style>
    #mapa { height: 800px; width:100%;}
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    
    <!-- Leaflet. Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    
    <div class="row">
        <div onclick="VerNoVerIcon('ver','mapa','bi bi-eye-slash','bi bi-eye')" style="cursor: pointer;">
            <i class="bi bi-eye-slash" id="saleicon_vermapa"></i>Ver mapa
        </div>
        <div class="col-md-6 col-sm-12" id="sale_vermapa">
            <div id="mapa" wire:ignore></div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="row" wire:ignore>
                <label for="exampleFormControlInput1" class="form-label">Número de id</label>
                <select wire:model="IdGanon" class="select2 form-select" id="MiIdGanon">
                    <option value="">Selecciona</option>
                    @foreach ($puntos as $i)
                        <option value="{{$i->clave}}"> {{$i->id}} [{{$i->zona}}] &nbsp;  {{$i->clave}}</option>
                    @endforeach
                </select>
            </div>

                <!-- -------------------- ACCIONES SOBRE LA PLANTA------------------->
                <div style="padding:15px;">
                    <!-- ----------- NUEVA PLANTA -------------->
                    <botton wire:click="ActivaNuevaPlanta()" class="btn btn-success">
                        <div style="font-size:60%;">Nueva Planta</div>
                        <img src="{{asset('iconos/IconoPlantaNueva.png')}}" style="height: 30px;">
                    </botton>
                    @if($IdGanon != '' )
                        <!-- ----------- PLANTA MUERTA -------------->
                        <botton data-bs-toggle="modal" data-bs-target="#ModalDeMuerte" class="btn btn-danger">
                            <div style="font-size:60%;">Planta Muerta</div>
                            <img src="{{asset('iconos/IconoPlantaMuerta.png')}}" style="height: 30px;">
                        </botton> 
                        <!-- ----------- MOVER PLANTA  -------------->
                        <botton wire:click="ActivaMuevePlanta()" class="btn btn-warning">
                            <div style="font-size:60%;">Mover planta</div>
                            <img src="{{asset('iconos/IconoMoverPlanta.png')}}" style="height: 30px;">
                        </botton> 
                        
                        <!-- ----------- PLANTA ENFERMA-------------->
                        <botton data-bs-toggle="modal"  class="btn btn-primary" disabled>
                            <div style="font-size:60%;">Planta Enferma</div>
                            <img src="{{asset('iconos/IconoPlantaEnferma.png')}}" style="height: 30px;">
                        </botton>

                        <!-- ----------- HISTORIAL DE PLANTA -------------->
                        <botton data-bs-toggle="modal"  class="btn btn-info" disabled>
                            <div style="font-size:60%;">Ver Historial</div>
                            <img src="{{asset('iconos/IconoExpedientePlanta.png')}}" style="height: 30px;">
                        </botton>
                    @endif
                </div>
                
                <!-- -------------------- MOVER LA PLANTA------------------->
                @if($MvePlanta== '1' or $NvaPlanta=='1')
                    <div id="sale_moverlugar" style="padding:10px; margin:20px; border-radius:5px; background-color:rgb(212, 224, 235);">
                        <p>Haz click sobre el mapa en el sitio en el que se encuentra o se va a encontrar el ejemplar:</p>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="Milat">Latitud:</label>
                                <input wire:model.live="lat" type="text" class="form-control @error('lat') error @enderror" id="Milat" disabled>
                                @error('lat') <error>{{$mesagge}} @enderror
                            </div>
    
                            <div class="form-group col-4">
                                <label for="Milng">Longitud:</label>
                                <input wire:model.live="lng" type="text" class="form-control @error('lng') error @enderror" id="Milng" disabled>
                                @error('lng') <error>{{$mesagge}} @enderror
                            </div>
                            
                            <div class="form group col-2">
                                @if($lat > 0 AND $lng < 0)
                                    @if($MvePlanta=='1')
                                        <botton wire:click="CambiarUbicacion()" wire:confirm="Estás por cambiar la ubicación de un ejemplar del jardín.\n ¿Seguro quieres continuar?" class="btn btn-warning">
                                            <i class="bi bi-geo-alt"></i>
                                            Mover 
                                        </botton>
                                    @endif
                                    @if($NvaPlanta=='1') 
                                        <botton wire:click="VerModalNuevaPlanta()" class="btn btn-warning">
                                            <i class="bi bi-geo-alt"></i>
                                            Agregar
                                        </botton>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button class="btn btn-secondary" wire:click="DesactivaCoordenadas()" onclick="VerNoVerIcon('movera','lugar','','')">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

            

            @if($IdGanon != '' )
                <h3>ID: {{$IdGanon}}</h3>

                <!-- ------------ sección de busqueda de nombres -->
                @if($taxonId == '')
                    <div class="row">
                        <!-- ---------------- Género supuesto ------------------>
                        <div class="form-group">
                            <label for="MiGenero">Género:</label><br>
                            <input wire:model="Genero" type="text" class="form-control @error('Genero') error @enderror" id="MiGenero" style="width:85%;display:inline-block;">
                            @error('Genero') <error>{{$mesagge}} @enderror
                            <button type="button" wire:click="BuscaEspecies()" class="btn btn-primary btn-sm">Buscar</button>
                        </div>
                        <!-- ---------------- Especie supuesta ------------------>
                        <div class="form-group" >
                            <label for="MiGenero">Especie:</label><br>
                            <select wire:model.live="Especie" class="select2 form-select" id="especie" style="width:85%; display:inline-block;">
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
                            
                            @if($Especie != '')
                                <button type="button" wire:click="AsignarTaxonId()" class="btn btn-primary btn-sm">Definir</button>
                            @endif
                        </div>
                    </div>

                    
                @endif

                <div class="row">
                    <!-- ---------------- Nombre científico de KEW ------------------>
                    <div class="form-group">
                        <label for="MiNomCient">Nombre científico [Familia] @if($taxonId != '') TaxonId({{$taxonId}}) @endif :</label>
                        <input wire:model="NomCient" type="text" class="form-control @error('NomCient') error @enderror" id="MiNomCient" @if($taxonId != '') disabled @endif style="width:85%;display:inline-block;">
                        

                        @error('NomCient') <error>{{$mesagge}} @enderror

                        @if($taxonId != '')
                            <i class="bi bi-trash icono-simple" wire:click="BorrarTaxonID()" wire:confirm="Estás por eliminar el nombre científico de este ejemplar.\n ¿Seguro que quieres continuar?" style=""></i>
                            <div style="font-size: 70%;">
                                <a href="{{$kew}}" target="new" class="nolink"><i class="bi bi-arrow-up-right-square"> Kew. Roy. Bot. Gard.</i></a> &nbsp;
                                <i class="bi bi-arrow-up-right-square"> Jardin Etnobot. ...</i> &nbsp; 
                                <i class="bi bi-arrow-up-right-square"> Jardin Bot. UNAM</i> &nbsp;
                            </div>
                        @endif
                        
                    </div>
                </div>
                
                <!-- ---------------- Separador ------------------>
                {{-- <  div style="margin:30px; height:2px; border-bottom:5px double gray;"></div> --}}

                <div class="row">
                    <!-- ---------------- Nombre común ------------------>
                    <div class="form-group">
                        <label for="MiNomComun">Nombre común</label>
                        <input wire:model="NomComun" type="text" class="form-control @error('NomComun') error @enderror" id="MiNomComun">
                        @error('NomComun') <error>{{$mesagge}} @enderror
                    </div>
                </div>

                <div class="row" style="margin:5px;">
                    <div class="form-group">
                        <!-- ---------------- Foto 1 ------------------>
                        @if(preg_match('/.jpg/',$foto1) )
                            <div style="display:inline; margin:3px;">
                                <a href="{{asset('FotosKobo/'.$foto1)}}" target="new" class="nolink">
                                    <img src="{{asset('FotosKobo/'.$foto1)}}" style="max-width:30%;">
                                </a>
                                <i class="bi bi-trash icono-simple" wire:click="BorrarFoto({{$foto1}})" wire:confirm="Estás por borrar definitivamente la imágen. ¿Quieres continura?"></i>
                            </div>
                        @endif
                        <!-- ---------------- Foto 2 ------------------>
                        @if(preg_match('/.jpg/',$foto2))
                            <div style="display:inline; margin:3px;">
                                <a href="{{asset('FotosKobo/'.$foto2)}}" target="new" class="nolink">
                                    <img src="{{asset('FotosKobo/'.$foto2)}}" style="max-width:30%;">
                                </a>
                                <i class="bi bi-trash icono-simple" wire:click="BorrarFoto({{$foto2}})" wire:confirm="Estás por borrar definitivamente la imágen. ¿Quieres continura?"></i>
                            </div>
                        @endif
                        <!-- ---------------- Foto 3 ------------------>
                        @if(preg_match('/.jpg/',$foto3))
                            <div style="display:inline; margin:3px;">
                                <a href="{{asset('FotosKobo/'.$foto3)}}" target="new" class="nolink">
                                    <img src="{{asset('FotosKobo/'.$foto3)}}" style="max-width:30%;">
                                </a>
                                <i class="bi bi-trash icono-simple" wire:click="BorrarFoto({{$foto3}})" wire:confirm="Estás por borrar definitivamente la imágen. ¿Quieres continura?"></i>
                            </div>
                        @endif
                        <!-- ---------------- Foto 4 ------------------>
                        @if(preg_match('/.jpg/',$foto4))
                            <div style="display:inline; margin:3px;">
                                <a href="{{asset('FotosKobo/'.$foto1)}}" target="new" class="nolink">
                                    <img src="{{asset('FotosKobo/'.$foto4)}}" style="max-width:30%;">
                                </a>
                                <i class="bi bi-trash icono-simple" wire:click="BorrarFoto({{$foto4}})" wire:confirm="Estás por borrar definitivamente la imágen. ¿Quieres continura?"></i>
                            </div>
                        @endif
                    </div>
                    <i class="bi bi-camera icono-simple"><i class="bi bi-plus"></i></i>
                </div>


                <div class="row">
                    <!-- ---------------- Zona ------------------>
                    <div class="col-6 form-group">
                        <label for="MiZona">Zona</label>
                        <select wire:model="Zona" type="text" class="form-select @error('Zona') error @enderror" id="MiZona" readonly disabled>
                            @foreach ($camellones as $c)
                                <option value="{{$c->cam_zona}}"> {{$c->cam_zona}}</option>
                            @endforeach
                        </select>
                        @error('Zona') <error>{{$mesagge}} @enderror
                    </div>
                    <!-- ---------------- Clavo físico ------------------>
                    <div class="col-6 form-group">
                        <label for="MiClavo">Clavo físico</label>
                        <input wire:model="Clavo" type="text" class="form-control @error('Clavo') error @enderror" id="MiClavo" disabled style="width:90%; display:inline-block;">
                        @error('Clavo') <error>{{$mesagge}} @enderror
                        @if($ClavoSiNo =='0')
                            <i wire:click="AgregarClavo()" wire:confirm="Estas por registrar un nuevo clavo físico. \n ¿Quieres continuar?" class="bi bi-plus-circle icono-simple"></i>
                        @elseif($ClavoSiNo =='1')
                            <i wire:click="AgregarClavo()" wire:confirm="Estas por eliminar un clavo físico. \n ¿Quieres continuar?" class="bi bi-trash icono-simple"></i>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <!-- ---------------- Notas ubicación ------------------>
                    <div class="form-group">
                        <label for="MiNotasUbica">Notas ubicación</label>
                        <textarea wire:model="NotasUbica" type="text" class="form-control @error('NotasUbica') error @enderror" id="MiNotasUbica"></textarea>
                        @error('NotasUbica') <error>{{$mesagge}} @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- ---------------- Observaciones ------------------>
                    <div class="form-group">
                        <label for="MiObservaciones">Observaciones</label>
                        <textarea wire:model="Observaciones" type="text" class="form-control @error('Observaciones') error @enderror" id="MiObservaciones"></textarea>
                        @error('Observaciones') <error>{{$mesagge}} @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- ---------------- Forma (ícono) ------------------>
                    <div class="col-6 form-group">
                        <label for="MiForma">Forma(ícono)</label>
                        <select wire:model="Forma" type="text" class="form-select @error('Forma') error @enderror" id="MiForma">
                            <option value="">Indica una forma</option>
                            @foreach ($tipos as $p)
                                <option value="{{$p->forma}}"> {{$p->forma}}</option>
                            @endforeach
                        </select>
                        @error('Forma') <error>{{$mesagge}} @enderror
                    </div>

                    <!-- ---------------- Revised ------------------>
                    <div class="col-6 form-group">
                        <div class="form-check">
                            <input wire:model="Revisado" value="0" class="form-check-input" type="radio" id="flexRadioDefault1">
                            <label class="form-check-label">
                            0 campo
                            </label>
                        </div>
                        <div class="form-check">
                            <input wire:model="Revisado" value="1" class="form-check-input" type="radio" id="flexRadioDefault2" >
                            <label class="form-check-label">
                            1 en revisión
                            </label>
                        </div>
                        <div class="form-check">
                            <input wire:model="Revisado" value="2" class="form-check-input" type="radio" id="flexRadioDefault3" >
                            <label class="form-check-label">
                            2 revisado
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <br>
                        <button wire:click="GuardarCambios()"  type="button" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>
                </div>

                <!-- ---------------- Separador ------------------>
                <div style="margin:30px; height:2px; border-bottom:5px double gray;"></div>
            @endif
        </div>
    </div>
    
    <!-- -------------------------------------------- MODAL DE MUERTE ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE MUERTE ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE MUERTE ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE MUERTE ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE MUERTE ---------------------------------------------->
    <div class="modal" tabindex="-1" id="ModalDeMuerte">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <img src="{{asset('iconos/IconoPlantaMuerta.png')}}" style="height: 30px;">
                        Registro de muerte de ejemplar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="sale_vermuertas">
                        <div>
                            Estás declarando muerto:<br>
                            Especie: <b>{{$NomCient}}</b><br>
                            Nombre común: <b>{{$NomComun}}</b><br>
                            ID: <b>{{$IdGanon}}</b><br>
                            <div id="sale_botonmuerta">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button"  onclick="VerNoVer('modal','muerta');VerNoVer('boton','muerta');VerNoVer('boton','muerta2')" class="btn btn-primary">Si. Continuar</button>
                            </div>
                        </div>
                        <div id="sale_modalmuerta" style="display:none;">
                            <div class="form-group">
                                <label>Indica la fecha del deceso:</label>
                                <input wire:model="RipDate" type="Date" class="form-control">
                                @error('RipDate') <error>{{$message}}</error> @enderror
                            </div>
                            <div class="form-group">
                                <label>Razón del deceso:</label>
                                <textarea type="text" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Evidencia del deceso:</label>
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="sale_botonmuerta2" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" wire:click="RegistrarMuerte()">
                        Registrar baja
                        <img src="{{asset('iconos/IconoPlantaMuerta.png')}}" style="height: 30px;">
                    </button>
                </div>
            </div>
        </div>
    </div>
      


    <!-- -------------------------------------------- MODAL DE PLANTA NUEVA ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE PLANTA NUEVA ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE PLANTA NUEVA ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE PLANTA NUEVA ---------------------------------------------->
    <!-- -------------------------------------------- MODAL DE PLANTA NUEVA ---------------------------------------------->
    <div class="modal" tabindex="-1" id="ModalDeNuevaPlanta">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <img src="{{asset('iconos/IconoPlantaNueva.png')}}" style="height: 30px;"> &nbsp;
                        Registro de nuevo ejemplar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="sale_vermuertas">
                        <div class="form-group">
                            <label>Origen del ejemplar: <red>*</red></label>
                            <div>
                            <div class="form-check">
                                    <input wire:model.live="OrigenDelNuevo" value="bitacora" class="form-check-input" type="radio" id="OrigenDelNuevo">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Bitácora de campo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input wire:model.live="OrigenDelNuevo" value="jardin" class="form-check-input" type="radio" id="OrigenDelNuevo" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Propágulo del jardín
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input wire:model.live="OrigenDelNuevo" value="vivero" class="form-check-input" type="radio" id="OrigenDelNuevo" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Plántula de vivero
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input wire:model.live="OrigenDelNuevo" value="otro" class="form-check-input" type="radio" id="OrigenDelNuevo" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Otro
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($OrigenDelNuevo=='otro')
                            <div class="form-group">
                                <label>Número de identificador único: <red>*</red></label>
                                <input wire:model="NvoId" type="text" class="form-control @error('NvoId') error @enderror">
                                @error('NvoId') <error>{{$message}}</error> @enderror
                            </div>
                            <div class="form-group">
                                <label>Género y especie:</label>
                                <input wire:model="NvoGenSp" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nombre común:</label>
                                <input wire:model="NvoNomCom" type="text" class="form-control">
                            </div>
                        @elseif($OrigenDelNuevo=='vivero')
                            <div class="form-group">
                                <label>Indica el No. de plántula: <red>*</red></label>
                                <input wire:model="" type="text" class="form-control @error('') error @enderror">
                                @error('') <error>{{$message}}</error> @enderror
                            </div>
                        @elseif($OrigenDelNuevo=='jardin')
                            <div class="form-group">
                                <label>Indica el No. Clavo de planta madre: <red>*</red></label>
                                <input wire:model="" type="text" class="form-control @error('') error @enderror">
                                @error('') <error>{{$message}}</error> @enderror
                            </div>
                        @elseif($OrigenDelNuevo=='bitacora')
                            <div class="form-group">
                                <label>Indica el No. de bitácora    : <red>*</red></label>
                                <input wire:model="" type="text" class="form-control @error('') error @enderror">
                                @error('') <error>{{$message}}</error> @enderror
                            </div>
                        @endif

                        
                        @if($OrigenDelNuevo != '')
                            <div class="form-group">
                                <label>Estado del ejemplar: <red>*</red></label>
                                <div>
                                <div class="form-check">
                                        <input wire:model.live="TamanioDelNuevo" value="plantula" class="form-check-input" type="radio" id="OrigenDelNuevo">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Plántula
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input wire:model.live="TamanioDelNuevo" value="adulto" class="form-check-input" type="radio" id="OrigenDelNuevo" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        Adulto
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" wire:click="IngresarNuevaPlanta()">
                        Agregar   
                        <img src="{{asset('iconos/IconoPlantaNueva.png')}}" style="height: 30px;">
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    
      

    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <script>
        ///// Carga el mapa
        const mapa = VerMapaJardin('mapa');

        ///// Genera variable de cada ícono y luego, genera cada ícono
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
        var arbolBl = new LeafIcon({iconUrl: '/iconos/ArbolBlanco.png'}),
        magueyBl = new LeafIcon({iconUrl: '/iconos/Maguey3Blanco.png'}),
        nopalBl = new LeafIcon({iconUrl: '/iconos/Nopal1Blanco.png'}),
        columnarBl = new LeafIcon({iconUrl: '/iconos/Columnar1Blanco.png'}),
        globosaBl = new LeafIcon({iconUrl: '/iconos/GlobosaBlanco.png'}),
        helechoBl = new LeafIcon({iconUrl: '/iconos/HelechoBlanco.png'}),
        arbustoBl = new LeafIcon({iconUrl: '/iconos/ArbustoBlanco.png'}),
        herbaceaBl = new LeafIcon({iconUrl: '/iconos/HerbaceaBlanca.png'}),
        arbustoVaraBl = new LeafIcon({iconUrl: '/iconos/ArbustoVaraBlanco.png'}),
        cicadaBl = new LeafIcon({iconUrl: '/iconos/CicadaBlanca.png', iconSize:[55,55]}),
        palmaBl = new LeafIcon({iconUrl: '/iconos/PalmaBlanca.png'}),
        orquideaBl = new LeafIcon({iconUrl: '/iconos/OrquideaBlanca.png', iconSize:[35,35]});

        ///// Carga puntos al mapa
        @foreach ($puntos as $i) 
            @if($i->revised == '2')
                ///// Carga íconos (marca) según tipo en cada punto
                @if ($i->forma =='Arbol')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:arbolBl}).addTo(mapa);
                @elseif ($i->forma =='Maguey')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:magueyBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea columnar')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:columnarBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea candelabriforme')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:columnarBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea globosa')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:globosaBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea nopal')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:nopalBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea rastrera')  /// cambiar icono
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:nopalBl}).addTo(mapa);
                @elseif ($i->forma =='Cactacea epifita')  /// cambiar icono
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:nopalBl}).addTo(mapa);
                @elseif ($i->forma =='Helecho')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:helechoBl}).addTo(mapa);
                @elseif ($i->forma =='Arbusto')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:arbustoBl}).addTo(mapa);
                @elseif ($i->forma =='Herbacea')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:herbaceaBl}).addTo(mapa);
                @elseif ($i->forma =='Arbusto vara')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:arbustoVaraBl}).addTo(mapa);
                @elseif ($i->forma =='Cicada')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:cicadaBl}).addTo(mapa);
                @elseif ($i->forma =='Palma')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:palmaBl}).addTo(mapa);
                @elseif ($i->forma =='Orquidea epifita')  
                    var marca = L.marker([{{$i->y_corregid}},{{$i->x_corregid}}],{icon:orquideaBl}).addTo(mapa);
                @endif

                ///// Pega el popup a la marca al hacer click al ícono
                marca.bindPopup("ID: {{$i->clave}}")
                
                ///// envía clave como variable al hacer click en el ícono
                marca.on('click', function(event){
                    var MiId = "{{$i->clave}}";
                    @this.set('IdGanon',MiId);
                    
                });
            @elseif($i->revised=='1')
                ///// Dibuja círculo en cada marca
                var circle = L.circle([{{$i->y_corregid}},{{$i->x_corregid}}], {
                    color: 'red',
                    fillColor: 'red',
                    fillOpacity: 0.5,
                    radius: 0.2,
                }).addTo(mapa);
                
                circle.bindPopup("ID: {{$i->clave}}");
                circle.on('click',function(event){
                    @this.set('IdGanon',"{{$i->clave}}")
                })
            @elseif($i->revised=='0')
                ///// Dibuja círculo en cada marca
                var circle = L.circle([{{$i->y_corregid}},{{$i->x_corregid}}], {
                    color: 'black',
                    fillColor: 'black',
                    fillOpacity: 0.5,
                    radius: 0.2,
                }).addTo(mapa);
                
                circle.bindPopup("ID: {{$i->clave}}");
                circle.on('click',function(event){
                    @this.set('IdGanon',"{{$i->clave}}")
                })
            @endif
        @endforeach
    
        // ///// Configuración de SELECT2
        // $('.select2').select2({
        //     'placeholder':'Indica un valor',
        //     'theme':'classic',
        //     'width':'95%',
        // });

    </script>

    @script
    <script>

        ///// Envía valor de select2 a livewire
        $('#MiIdGanon').on('change',function(){
            @this.set('IdGanon',$(this).val());
        });
        ///// Cierra modal de muerte
        $wire.on('CierraModal', () => {
            $('#ModalDeMuerte').modal('hide');                
            alert('¡ El ejemplar ha muerto !\n ¡¡ Larga vida al ejemplar !!')
        });

        ///// Muestra modal de planta nueva
        $wire.on('MuestraModalPlantaNueva', () => {
            $('#ModalDeNuevaPlanta').modal('show');                
        });

        ///// Cierra modal de planta nueva
        $wire.on('CierraModalPlantaNueva', () => {
            $('#ModalDeNuevaPlanta').modal('hide');                
        });

        ///// Inicia la captura de coordenadas del mapa (evento de click en mapa)
        $wire.on('CapturaCoordenadas', () => {
            // alert('Haz click en el nuevo sitio sobre el mapa.\n(Debe ser un sitio sin planta)');
            function onMapClick(e) {
                //alert("Coordenadas lat: " + e.latlng.lat + " lng: " + e.latlng.lng );
                @this.set('lat',e.latlng.lat);
                @this.set('lng',e.latlng.lng);
                //Genera un marcador al hacer click
                L.marker(e.latlng).addTo(mapa)
            }
            mapa.on('click', onMapClick);
        });
    </script>
    @endscript
    
    
</div>


