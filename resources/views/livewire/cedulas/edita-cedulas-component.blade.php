<div>
    <div class="container">
        <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
        <div class="row" style="margin:5px; border-radius:8px; ">
            <!-- ------------------------- FICHA GENERAL IZQUIERDA ------------------------>
            <div class="col-12 col-md-4 col-lg-3 text-wrap" style="position:relative; padding:10px; border-top-left-radius:8px; background-color:#CDC6B9;">
                <center>
                    <h1>Editor de cédulas</h1>
                </center>
                <!-- ------------------------- Logo del Jardín propietario de la cédula ------------------------>
                <div class="row pb-2" style="">
                    <div class="col-12 py-2" style="text-align: center; color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center; font-size:130%; font-weigth:bold;">
                        <a href="/sp/{{ $urlced->ced_urlurl }}/{{ $jardinData->cjar_siglas }}" class="nolink">
                            {{ $jardinData->cjar_nombre }}<br>
                            <img src="@if($jardinData->cjar_logo=='')/avatar/jardines/default.png @else /avatar/jardines/{{ $jardinData->cjar_logo }} @endif" style="width:80px;"><br>
                        </a>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-12">
                        <center>
                            <h3>{{ $urlced->url_nombre }}</h3>
                            <h3>{{ $urlced->clen_lengua }} ({{ $urlced->ced_clencode }})</h3>
                            <h3>
                                <div style="">
                                    @if($urlced->ced_edo=='0')

                                            <i class="bi bi-0-circle-fill" style="color:red;"> En elaboración</i>
                                            <button wire:click="EnviarCedula()" wire:confirm="Estás por iniciar el proceso de publicación. No podrás ver la cédula hasta que concluya este proceso. ¿Deseas continuar?" class="btn btn-primary">Finalizar e<br>iniciar a publicación</button>
                                    @elseif($urlced->ced_edo=='1') <i class="bi bi-1-circle-fill" style="color:orange;">En corrección</i>
                                    @elseif($urlced->ced_edo=='2') <i class="bi bi-2-circle-fill" style="color:yellow;">En autorizacion</i>
                                    @elseif($urlced->ced_edo=='3') <i class="bi bi-3-circle-fill" style="color:pink;">En autorizacion</i>
                                    @elseif($urlced->ced_edo=='4') <i class="bi bi-4-circle-fill" style="color:purple;">En autorizacion</i>
                                    @elseif($urlced->ced_edo=='5') <i class="bi bi-5-circle-fill" style="color:darkgreen;"> Públicada</i>
                                    @endif
                                </div>
                            </h3>
                        </center>
                    </div>
                </div>
                {{--
                <!-- ------------------------- Nombre científico ------------------------>
                <div style="color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center;font-weigth:bold;" >
                    <div class="pt-4 d-block d-md-none"          style="font-size:150%;">{{ $taxo['sp'] }}</div>
                    <div class="pt-4 d-none d-md-block d-lg-none"style="font-size:120%;">{{ $taxo['sp'] }}</div>
                    <div class="pt-4 d-none d-lg-block"          style="font-size:140%;">{{ $taxo['sp'] }}</div>
                </div>

                <!-- ------------------------- Nombre Común ------------------------>
                <div style="color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center; font-weight:100;" >
                    <div class="py-4 d-block d-md-none"          style="font-size:120%;">{{ $taxo['nombrecomun'] }}</div>
                    <div class="py-4 d-none d-md-block d-lg-none"style="font-size:80%;"><b>{{ $taxo['nombrecomun'] }}</b></div>
                    <div class="py-4 d-none d-lg-block"          style="font-size:110%;"><b>{{ $taxo['nombrecomun'] }}</b></div>
                </div>
                --}}
                <div class="row">
                    <div class="col-12 ">
                        <h5>Imágenes</h5>
                        <input type="file" wire:model="NvaImagen" class="form-control" style="width:100%;" accept="image/*, video/*"  enctype="multipart/form-data" >
                        @error('NvaImagen')<error>{{ $message }}</error>@enderror
                    </div>
                    <div class="col-9">
                        <select wire:model="NvaImagenTipo" class="form-select">
                            <option value="">Indica el lugar en el que va la imágen</option>
                            @foreach ($tipoImgs as $img)
                                <option value="{{ $img->cimg_name }}">{{ $img->cimg_name }}</option>
                            @endforeach
                        </select>
                        @error('NvaImagenTipo')<error>{{ $message }}</error>@enderror
                    </div>
                    <div class="col-3">
                        <button wire:click="SubirFoto()" wire:loadding.attr="disabled" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button>
                    </div>
                    <div class="col-12">
                        <div wire:loading.attr="block" wire:target="NvaImagen" style="display: none;">
                            Cargando imágen...
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------- FOTO DE LA PORTADA ------------------------>
            <div class="col-sm-12 col-md-6 col-lg-7" style="height:600px;">
                <center>
                    @if($fotos->where('imgsp_cimgname','portada')->value('imgsp_file') != '')
                        <!-- foto -->
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','portada')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','portada')->value('imgsp_file') }}"
                            class="py-2 py-sm-2 py-md-0 py-lg-0 img-fluid" style="height:580px; center">
                        </a>
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('portada')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @else
                        <!-- subir nueva imagen -->
                        <div class="form-group">
                            <label class="form-label">Imagen portada</label>
                            {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:300px; display:inline;">
                            <button wire:click="SubirFoto('portada')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                        </div>
                    @endif
                </center>
            </div>

            <!-- ------------------------- GALERÍA DE FOTOGRAFÍAS ------------------------>
            <div class="col-sm-12 col-md-2 col-lg-2 center">
                <!-- img ppal1-->
                @if($fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('ppal1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal1</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('ppal1')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif
                <!-- img ppal2 -->
                @if($fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('ppal2')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal2</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('ppal2')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif
                <!-- img ppal3 -->
                @if($fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('ppal3')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal3</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('ppal3')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif
                <!-- img ppal4-->
                @if($fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                        <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('ppal4')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                   </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal4</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('ppal4')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif

                <!-- flecha -->
                {{-- <div class="center" style="text-align: center;">
                    <i class="bi bi-arrow-down-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
                </div> --}}
            </div>
        </div>




        <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
        <div class="row" style="margin:5px; border-bottom-left-radius:8px;">
            <!-- -------------- Menú izquierdo ----------------->
            <div class="col-12 col-sm-12 col-md-2 col-lg-2" style="color:#efebe8;  padding:20px; font-size:1.3em; background-color:#CDC6B9;">
                <H3>
                    {{-- {{ $lenguas->where('clen_code',session('localeid'))->value('clen_autonimias') }}
                    {{ $lenguas->where('clen_code',session('localeid'))->value('clen_lengua') }} --}}
                </H3>
                <nav class="navbar navbar-expand-md" >

                    <!-- --------- Menú Hamburguesa -------------- -->
                    <button class="navbar-toggler"
                        data-toggle="collapse" type="button" data-bs-toggle="offcanvas" data-bs-target="#MenuEspecifico">
                        <span style="font-size:50%;">Menú</span><span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- --------- Menú Extendido -------------- -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="MenuEspecifico">
                        <div class="offcanvas-header">
                            <a class="offcanvas-logo" href="index.html" id="offcanvasNavbar2Label">
                                <img src="/imagenes/logo-nav.png" alt="logo del Jardín Etnobotánico">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <!-- titulos -->
                        @foreach ($titulos as $titulo)
                            <div class="px-0 py-2" style="font-size:90%;">
                                <a class="nolink" href="#IrA{{ $titulo->txt_id }}tit">
                                    {!! $titulo->txt_codigo !!}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </nav>
            </div>

            <!-- -------------- Texto central ----------------->
            <!-- -------------- Texto central ----------------->
            <!-- -------------- Texto central ----------------->
            <div class="col-12 col-sm-12 col-md-7 col-lg-7" style="background-color:#CDC6B9;">
                @foreach($texto as $text)
                    <div class="row" style="@if($text->txt_id==$TxtIdEnEdicion) border:3px solid #CD7B34; @endif">
                            <!-- muestra número de orden del párrafo e ícono de editar  -->
                            <div wire:click="DeterminaParrafoAeditar('{{ $text->txt_id }}')" class="PaClick" style="color:#CD7B34;">
                                <i class="bi bi-arrow-90deg-down"></i>
                                Orden {{ $text->txt_order }} &nbsp; | &nbsp;
                                ID: {{ $text->txt_id}}
                                    <i class="bi bi-pencil-square"></i>
                                    <i class="bi bi-arrow-down"></i>
                            </div>
                            <!-- muestra título (en su caso) -->
                            @if($text->txt_titulo == '1')
                                <div class="col-12" style="margin-top: 30px;">
                                    <!-- muestra título -->
                                    <h4>
                                        <a name="IrA{{ $text->txt_id }}tit">{!! $text->txt_codigo !!}</a>
                                        @if($text->txt_audio != '')
                                            <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:middle;" onclick="Escucha('/cedulas/audios/{{ $text->txt_audio }}')"></i><span style="font-size:10px;">{{ $text->txt_id }}</span>
                                        @endif
                                    </h4>
                                </div>
                            <!-- muestra párrafo (en su caso)-->
                            @else
                                <div class="col-12 my-2">
                                    {!! $text->txt_codigo !!}
                                    <!-- audio-->
                                    @if($text->txt_audio != '')
                                        {{-- <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;" onclick="Escucha('/cedulas/audios/{{ $text->txt_audio }}')"></i> --}}
                                        <audio id="SpAudio{{ $text->txt_id }}">
                                            <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/ogg">
                                            <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/mpeg">
                                            El navegador no soporta el audio
                                        </audio>
                                        <i class="bi bi-volume-down-fill" id="IconPlay{{ $text->txt_id }}" onclick="playAudio('{{ $text->txt_id }}')" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;"></i>
                                        <i class="bi bi-volume-mute-fill" id="IconStop{{ $text->txt_id }}" onclick="pauseAudio('{{ $text->txt_id }}')" style="cursor:pointer;display:none; font-size:200%;vertical-align:top;"></i>
                                        <span style="font-size:10px;">{{$text->txt_id }}</span>
                                    @endif
                                </div>
                            @endif

                            <!-- --------------------------------------- -->
                            <!-- ------------- EDITOR DE PÁRRAFO ------- -->
                            <!-- --------------------------------------- -->
                            @if($text->txt_id == $TxtIdEnEdicion)
                                <div class="col-12" style="background-color:#87796d;">
                                    <div class="row my-1">
                                        <!-- selector titulo/parrafo -->
                                        <div class="col-6 col-md-4 form-group">
                                            <label class="form-label">Tipo</label><br>
                                            <div class="form-check" style="display:inline-block">
                                                <input wire:model.live="NvoTitulo" class="form-check-input" type="radio" value="1">
                                                <label class="form-check-label">Título</label>
                                            </div>
                                            <div class="form-check" style="display:inline-block">
                                                <input wire:model.live="NvoTitulo" class="form-check-input" type="radio" value="0">
                                                <label class="form-check-label">Párrafo</label>
                                            </div>
                                        </div>
                                        <!-- Orden -->
                                        <div class="col-6 col-md-4 form-group">
                                            <label class="form-label">Orden:</label>
                                            <input wire:model="NvoOrder" type="number" class="form-control" style="width:120px;">
                                        </div>
                                        <!-- editor del texto de título o de párrafo -->
                                        <div class="col-12 my-2">
                                            @if($NvoTitulo=='1')
                                                <input wire:model="NvoCodigo" type="text" class="form-control">
                                            @else
                                                <textarea rows="7" wire:model="NvoCodigo" class="form-control"></textarea>
                                            @endif
                                        </div>
                                        <!-- audio -->
                                        <div class="col-12 col-md-6 form-group">
                                            <label class="form-label">Audio</label> &nbsp; <span style="font-size:80%;">{{$text->txt_audio}}</span><br>
                                            @if($text->txt_audio != '')
                                                <audio controls>
                                                    <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/ogg">
                                                    <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                                <!-- botón tirar audio -->
                                                <botton wire:click="BorrarAudio('{{ $text->txt_id }}')" wire:confirm="Estás por eliminar PERMANENTEMENTE este audio. ¿Deseas continuar?." class="btn btn-secondary" >
                                                    <i class="bi bi-trash-fill"></i>
                                                </botton>
                                            @else
                                                <input type="file" wire:model="NvoAudio" class="form-control">
                                            @endif
                                            @if($NvoTitulo=='1') <br>Se sugiere no crear audios en los títulos y leer el título como parte del primer párrafo siguiente @endif
                                        </div>
                                        <!-- video -->
                                        <div class="col-12 col-md-6 form-group">
                                            <label class="form-label">Video</label>
                                            @if($text->txt_video != '')
                                                <video width='70%' controls wire:ignore>
                                                    <source src='/cedulas/{{ $text->txt_video }}' type='video/mp4'>
                                                </video>
                                                <botton wire:click="BorrarElemento('video')" wire:confirm="Estás por eliminar PERMANENTEMENTE este video. ¿Deseas continuar?." class="btn btn-secondary" style="display:inline-block;">
                                                    <i class="bi bi-trash-fill"></i>
                                                </botton>
                                            @else
                                                <input type="file" wire:model="NvoVideo" class="form-control">
                                            @endif
                                        </div>
                                        <!-- img1 -->
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Imagen 1</label>
                                            @if($text->txt_img1 != '')
                                                <img src="/cedulas/{{ $text->txt_img1 }}" style="width:80%;">
                                                <botton wire:click="BorrarElemento('img1')" wire:confirm="Estás por eliminar PERMANENTEMENTE esta imagen. ¿Deseas continuar?." class="btn btn-secondary" style="display:inline-block;">
                                                    <i class="bi bi-trash-fill"></i>
                                                </botton>
                                            @else
                                                <input type="file" wire:model="NvoImg1" class="form-control">
                                            @endif
                                        </div>

                                        <!-- img2 -->
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Imagen 2</label>
                                            @if($text->txt_img2 != '')
                                                <img src="/cedulas/{{ $text->txt_img2 }}" style="width:80%;">
                                                <botton wire:click="BorrarElemento('img2')" wire:confirm="Estás por eliminar PERMANENTEMENTE esta imagen. ¿Deseas continuar?." class="btn btn-secondary" style="display:inline-block;">
                                                    <i class="bi bi-trash-fill"></i>
                                                </botton>
                                            @else
                                                <input type="file" wire:model="NvoImg2" class="form-control">
                                            @endif
                                        </div>

                                        <!-- img -->
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Imagen 3</label>
                                            @if($text->txt_img3 != '')
                                                <img src="/cedulas/{{ $text->txt_img3 }}" style="width:80%;">
                                                <botton wire:click="BorrarElemento('img3')" wire:confirm="Estás por eliminar PERMANENTEMENTE esta imagen. ¿Deseas continuar?." class="btn btn-secondary" style="display:inline-block;">
                                                    <i class="bi bi-trash-fill"></i>
                                                </botton>
                                            @else
                                                <input type="file" wire:model="NvoImg3" class="form-control">
                                            @endif
                                        </div>


                                        <!-- botón de guardar-->
                                        <div class="col-4 my-4">
                                            <button wire:click="GuardarCambios()" class="btn btn-primary"><i class="bi bi-save"></i>
                                                Guardar cambios
                                            </button>
                                        </div>
                                        <div class="col-4 my-4">
                                            <button wire:click="CancelaCambio()" class="btn btn-secondary"><i class="bi bi-x-circle"></i>
                                                Cancelar cambios
                                            </button>
                                        </div>
                                        <div class="col-4 my-4">
                                            <button wire:click="BorrarParrafo('{{ $text->txt_id }}')" wire:confirm="Estas por eliminar PERMANENTEMENTE este párrafo. ¿Quieres continuar?" class="btn btn-danger">
                                                <i class="bi bi-trash"></i> Eliminar párrafo
                                            </button>
                                        </div>
                                        <span style="font-size: 80%;">Versión del párrafo: {{ $text->txt_version }}</span>
                                    </div>
                                </div>
                            @endif
                    </div>
                @endforeach

                <div class="row m-4">
                    <button wire:click="NuevoParrafo()" class="boton2" style="height:90px;font-size:150%;">
                        Crear Nuevo Párrrafo
                    </button>
                </div>
            </div>


            <!-- -------------- Imágenes derecha ----------------->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3" style="background-color:#CDC6B9;">
                <!-- lateralvideo1 -->
                @if($fotos->where('imgsp_cimgname','lateralvideo1')->value('imgsp_file') != '')
                    <video width="40" height="40" controls>
                        <source src="" type="video/ogg">
                        Tu navegador no soporta el video
                    </video>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('lateralvideo1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Video lateralvideo1</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('lateralvideo1')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif

                <!-- lateral1 -->
                @if($fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('lateral1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral1</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('lateral1')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif

                <!-- lateral2 -->
                @if($fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('lateral2')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral2</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('lateral2')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif

                <!-- lateral3 -->
                @if($fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    <!-- botón borrar -->
                    <div class="PaClick" wire:click="BorraFoto('lateral3')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                        <i class="bi bi-trash"></i>
                    </div>
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral3</label>
                        {{-- <input type="file" wire:model="NuevaImagen" class="form-control" style="width:200px;display:inline;">
                        <button wire:click="SubirFoto('lateral3')" class="btn btn-sm btn-secondary" style="margin:5px;">Subir</button> --}}
                    </div>
                @endif
            </div>
        </div>

        <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
        <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
        <div class="row my-4 p-3" style="margin:5px; border-radius:8px; background-color:#87796d;">
            <div class="col-12 " style="">
                <h4>Versión</h4>
                {{ $version['ced_id'] }}_{{ $version['cedula'] }} V. {{ $version['ced_version'] }}  &nbsp; Última modificación: {{ $version['ced_versiondate'] }} <br><br>
                <h4>Cita:</h4>
                {!! $version['ced_cita'] !!}
                <br><br>
                {{-- <h4>Fuentes:</h4>
                <ul>
                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
                    <li>Dicta quasi consectetur quo itaque sit? Repudiandae maxime ipsam, </li>
                    <li>Eebitis eligendi, dolore animi, error necessitatibus minus hic sit ducimus corrupti!</li>
                </ul> --}}
            </div>
        </div>
    </div>

</div>
