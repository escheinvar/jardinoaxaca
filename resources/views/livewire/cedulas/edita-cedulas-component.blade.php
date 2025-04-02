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
                                <div style="" c>
                                    @if($urlced->ced_edo=='0')
                                        <i class="bi bi-0-circle-fill" style="color:red;"> En elaboración</i><br>
                                        <button wire:click="EnviarCedula('2')" wire:confirm="Estás por iniciar el proceso de publicación. No podrás ver la cédula hasta que concluya este proceso. ¿Deseas continuar?" class="btn btn-primary my-2">
                                            Terminar edición
                                        </button>
                                    @elseif($urlced->ced_edo=='1') <i class="bi bi-1-circle-fill" style="color: #CD7B34;">En corrección</i><br>
                                        <button wire:click="EnviarCedula('2')" wire:confirm="Estás por iniciar el proceso de publicación. No podrás ver la cédula hasta que concluya este proceso. ¿Deseas continuar?" class="btn btn-primary my-2">
                                            Terminar corrección
                                        </button>
                                    @elseif($urlced->ced_edo=='2') <i class="bi bi-2-circle-fill" style="color:purple;">En autorización</i><br>
                                        <button wire:click="EnviarCedula('5')" wire:confirm="Estás por liberar al público esta cédula. ¿Deseas continuar?" class="btn btn-primary my-2">
                                            Publicar
                                        </button>
                                        <button onclick="VerNoVer('Notas','Correccion')" class="btn btn-primary my-2">
                                            Corregir
                                        </button>
                                    @elseif($urlced->ced_edo=='3') <i class="bi bi-3-circle-fill" style="color:#CD7B34;">En edición</i>
                                        <button wire:click="EnviarCedula('4')" wire:confirm="Estás por iniciar el proceso de publicación. No podrás ver la cédula hasta que concluya este proceso. ¿Deseas continuar?" class="btn btn-primary my-2">
                                            Terminar edición
                                        </button>
                                    @elseif($urlced->ced_edo=='4') <i class="bi bi-4-circle-fill" style="color:purple;">En autorización</i>
                                        <button wire:click="EnviarCedula('5')" wire:confirm="Estás por liberar al público esta cédula. ¿Deseas continuar?" class="btn btn-primary my-2">
                                            Publicar
                                        </button>
                                        <button onclick="VerNoVer('Notas','Correccion')" class="btn btn-primary my-2">
                                            Corregir
                                        </button>
                                    @elseif($urlced->ced_edo=='5') <i class="bi bi-5-circle-fill" style="color:darkgreen;"> Públicada</i>
                                    @endif

                                    <!-- notas de correccion-->
                                    <div id="sale_NotasCorreccion" style="display:none;">
                                        <span style="font-size: 80%">Describe las correcciones solicitadas</span><br>
                                        <textarea wire:model="NotasDeCorreccion" class="form-control"></textarea>
                                        <button wire:click="EnviarCedula('1')"  class="btn btn-primary my-2">
                                            Solicitar corrección
                                        </button>
                                    </div>
                                </div>
                            </h3>
                        </center>
                    </div>
                </div>

                <div class="row">
                    @if($cedulas=='1')
                        <div class="col-12 ">
                            <h5>Imágenes</h5>
                            <input type="file" wire:model="NvaImagen" class="form-control my-2" style="width:100%;" accept="image/*, video/*"  enctype="multipart/form-data" >
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
                    @endif
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
                        @if($cedulas=='1')
                            <!-- botón borrar -->
                            <div class="PaClick" wire:click="BorraFoto('portada')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline;vertical-align:bottom;">
                                <i class="bi bi-trash"></i>
                            </div>
                        @endif
                    @else
                        <!-- subir nueva imagen -->
                        <div class="form-group">
                            <label class="form-label">Imagen portada</label>
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
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('ppal1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal1</label>
                    </div>
                @endif
                <!-- img ppal2 -->
                @if($fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('ppal2')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal2</label>
                    </div>
                @endif
                <!-- img ppal3 -->
                @if($fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('ppal3')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal3</label>
                    </div>
                @endif
                <!-- img ppal4-->
                @if($fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') != '' )
                    <div class="center" style="display:inline-block;width:80%;">
                        <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') }}" target="new">
                            <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        </a>
                    </div>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('ppal4')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen ppal4</label>
                    </div>
                @endif
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
                                            <label class="form-label">Orden:</label><br>
                                            <input wire:model="NvoOrder" type="number" class="form-control" style="width:120px; display:inline-block;">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <small onclick="VerNoVer('ver','Manual')" class="PaClick"><i class="bi bi-info-circle"></i> Manual HTML</small>
                                        </div>
                                        <!-- manual HTML -->
                                        <div id="sale_verManual" class="col-12 my-2" style="display:none;">
                                            <center><b>Manual Rápido de HTML:</b></center><br>                                            <div style="display:inline-block; width:45%;">
                                                Negritas: &#60;b&#62;<b>negritas</b>&#60;/b&#62;<br>
                                                Cursivas: &#60;i&#62;<i>cursiva</i>&#60;/i&#62;<br>
                                                Subrayado: &#60;u&#62;<u>subrayado</u>&#60;/u&#62;<br>
                                            </div>
                                            <div style="display:inline-block; width:45%;">
                                                Tachado: &#60;s&#62;<s>subrayado</s>&#60;/s&#62;<br>
                                                Superíndice: A&#60;sup&#62;<sup>superí.</sup>&#60;/sup&#62;<br>
                                                Subíndice: A&#60;sub&#62;<sub>subí.</sub>&#60;/sub&#62;<br>
                                                Salto de línea: &#60;br&#62;<br>
                                            </div>
                                        </div>
                                        <!-- editor del texto de título o de párrafo -->
                                        <div class="col-12 my-2 form-group">
                                            <label class="form-label">Texto html:</label><br>
                                            @if($NvoTitulo=='1')
                                                <input wire:model="NvoCodigo" type="text" class="form-control">
                                            @else
                                                <textarea rows="7" wire:model="NvoCodigo" class="form-control"></textarea>
                                            @endif
                                            <hr>
                                        </div>
                                        <!-- audio -->
                                        <div class="col-12 col-md-6 form-group">
                                            @if($text->txt_audio != '')
                                                <audio controls>
                                                    <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/ogg">
                                                    <source src='/cedulas/audios/{{ $text->txt_audio }}' type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                                <!-- borrar audio -->
                                                <div class="form-check" style="display:inline-block;">
                                                    <input wire:model="DelAudio" class="form-check-input" type="checkbox" value="false">
                                                    <label class="form-check-label"> Eliminar audio</label>
                                                </div>
                                                <!-- oir audio -->
                                            @else
                                                <!-- nuevo audio -->
                                                <label class="form-label">Audio</label>
                                                <input type="file" wire:model="NvoAudio" class="form-control">
                                            @endif
                                            {{-- @if($NvoTitulo=='1') <br>Se sugiere no crear audios en los títulos y leer el título como parte del primer párrafo siguiente @endif --}}
                                        </div>

                                        @if($cedulas=='1')
                                            <!-- video -->
                                            <div class="col-12 col-md-6 form-group">
                                                @if($text->txt_video != '')
                                                    <!-- ver video-->
                                                    <label class="label">{{ $text->txt_video }}</label>
                                                    <video width='95%' controls wire:ignore>
                                                        <source src='/cedulas/{{ $text->txt_video }}' type='video/mp4'>
                                                    </video>
                                                    <!-- eliminar video-->
                                                    <div class="form-check" style="display:inline-block;">
                                                        <input wire:model="DelVideo" class="form-check-input" type="checkbox" value="false">
                                                        <label class="form-check-label">Eliminar video</label>
                                                    </div>
                                                @else
                                                    <!-- nuevo video-->
                                                    <label class="form-label">Video</label>
                                                    <input type="file" wire:model="NvoVideo" class="form-control">
                                                @endif
                                            </div>

                                            <!-- img1 -->
                                            <div class="col-12 col-md-4 form-group">
                                                @if($text->txt_img1 != '')
                                                    <!-- ver img1 -->
                                                    <label class="label">{{ $text->txt_img1 }}</label>
                                                    <img src="/cedulas/{{ $text->txt_img1 }}" style="width:95%;">
                                                    <!-- eliminar img1-->
                                                    <div class="form-check" style="display:inline-block;">
                                                        <input wire:model="DelImg1" class="form-check-input" type="checkbox" value="false">
                                                        <label class="form-check-label">Eliminar img1</label>
                                                    </div>
                                                @else
                                                    <!-- nuevo img1 -->
                                                    <label class="form-label">Imagen 1</label>
                                                    <input type="file" wire:model="NvoImg1" class="form-control">
                                                @endif
                                            </div>

                                            <!-- img2 -->
                                            <div class="col-12 col-md-4 form-group">
                                                @if($text->txt_img2 != '')
                                                    <!-- ver img2 -->
                                                    <label class="form-label">{{ $text->txt_img2 }}</label>
                                                    <img src="/cedulas/{{ $text->txt_img2 }}" style="width:95%;">
                                                    <!-- eliminar img2-->
                                                    <div class="form-check" style="display:inline-block;">
                                                        <input wire:model="DelImg2" class="form-check-input" type="checkbox" value="false">
                                                        <label class="form-check-label">Eliminar img2</label>
                                                    </div>
                                                @else
                                                    <!-- nuevo img2 -->
                                                    <label class="form-label">Imagen 2</label>
                                                    <input type="file" wire:model="NvoImg2" class="form-control">
                                                @endif
                                            </div>

                                            <!-- img3 -->
                                            <div class="col-12 col-md-4 form-group">
                                                @if($text->txt_img3 != '')
                                                    <!-- ver img3 -->
                                                    <label class="form-label">{{ $text->txt_img3 }}</label>
                                                    <img src="/cedulas/{{ $text->txt_img3 }}" style="width:95%;">
                                                    <!-- eliminar img3 -->
                                                    <div class="form-check" style="display:inline-block;">
                                                        <input wire:model="DelImg3" class="form-check-input" type="checkbox" value="false">
                                                        <label class="form-check-label">Eliminar img3</label>
                                                    </div>
                                                @else
                                                    <!-- nueva img3 -->
                                                    <label class="form-label">Imagen 3</label>
                                                    <input type="file" wire:model="NvoImg3" class="form-control">
                                                @endif
                                            </div>
                                        @endif


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
                                        <span style="font-size: 80%;">Versión del párrafo: {{ $text->txt_version }} &nbsp; &nbsp;
                                        <div class="form-check" style="display:inline-block;">
                                            <input class="form-check-input" type="checkbox" value="false" wire:model="NvaVersion">
                                            <label class="form-check-label">Avanzar versión</label>
                                        </div>
                                        </span>
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
                    <video width="100%"  controls wire:ignore>
                        <source src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateralvideo1')->value('imgsp_file') }} }}" type="video/ogg">
                        Tu navegador no soporta el video
                    </video>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('lateralvideo1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Video lateralvideo1</label>
                    </div>
                @endif

                <!-- lateral1 -->
                @if($fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('lateral1')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral1</label>
                    </div>
                @endif

                <!-- lateral2 -->
                @if($fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('lateral2')" wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?"  style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral2</label>
                    </div>
                @endif

                <!-- lateral3 -->
                @if($fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                    </a>
                    @if($cedulas=='1')
                        <!-- botón borrar -->
                        <div class="PaClick" wire:click="BorraFoto('lateral3')"  wire:confirm="Estás por elminar PERMANENTEMENTE una foto para todo el Jardín. ¿Deseas continuar?" style="display:inline-block;vertical-align:bottom;">
                            <i class="bi bi-trash"></i>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="form-label">Imagen lateral3</label>
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
                id {{ $version['ced_id'] }} {{ $version['cedula'] }} <b>V. {{ $version['ced_version'] }}</b>  &nbsp; Última modificación: {{ $version['ced_versiondate'] }}
                &nbsp; &nbsp;
                @if($cedulas=='1')
                    <span onclick="VerNoVer('ver','Versionar')" class="PaClick">Versionar</span>
                    <button wire:click="NuevaVersion()" class="btn btn-primary" id="sale_verVersionar" style="display:none;">
                        Avanzar versión
                    </button>
                @endif
                <br><br>


                <h4>Cita @if($cedulas=='1')<span class="PaClick" onclick="VerNoVer('ver','cita')"><i class="bi bi-pencil-square"></i></span> @endif :</h4>
                {!! $version['ced_cita'] !!}
                @if($cedulas=='1')
                    <div id="sale_vercita" style="display: none;">
                        <textarea wire:model="NvaCita" class="form-control" style="width:100%;"></textarea>
                        <div style="font-size: 90%;">
                            Apellido, A.,  &nbsp;  Apellido, B.,  &nbsp;  y  &nbsp;  Apellido, C.  &nbsp;  Título del artículo de la página web,  &nbsp;  lengua,  &nbsp;  Versión.  Nombre del sitio web. {{ url('/') }}/sp/{{ $urlced->ced_urlurl }}/{{ $urlced->ced_cjarsiglas }}
                        </div>
                        <button wire:click="NuevaCita()" class="btn btn-primary">
                            Guardar nueva cita
                        </button>
                    </div>
                @endif
                <br><br>
            </div>
        </div>
    </div>

</div>
