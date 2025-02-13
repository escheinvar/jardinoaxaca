<div>
<div class="container">
    <!-- -------------------------------------- FRANJA CLASIFICACIÓN ----------------------------------------------->
    <div style="overflow:auto; background-color:#CDC6B9; border-radius:8px; margin:5px; padding:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;">
        <div style="display:inline-block;">
                <a href="/especies" class="nolink"> <i class="bi bi-arrow-left-short"></i>Regresar</a> &nbsp; &nbsp;
                {{-- Jardin: {{ $jardin }} --}}
                <b>{{ $taxo['reino'] }} &nbsp; | &nbsp;  Familia {{ $taxo['familia'] }} &nbsp; | &nbsp;  <i>{{ $taxo['sp'] }}</i></b> &nbsp; &nbsp; {{ $taxo['nombrecomun'] }} &nbsp;
        </div>
        <div style="display:inline-block;">
            <span class="d-none d-xl-inline-block">xl ExtraGrande</span>
            <span class="d-none d-lg-inline-block d-xl-none">lg Grande</span>
            <span class="d-none d-md-inline-block d-lg-none">md Mediano</span>
            <span class="d-none d-sm-inline-block d-md-none ">sm Chico</span>
            <span class="d-xs-block d-sm-none">sm Extrachico</span>
        </div>


        <div style="float: right;">
            Idioma:
            <select wire:change="idiomas()" wire:model="idioma" id="MiIdioma" class="form-control lenguas" style="width:150px; display:inline-block;">
                @foreach ($lenguas as $len)
                    <option value="{{ $len->clen_code }}">{{ $len->clen_lengua }} @if($len->clen_autonimia != '') ({{ $len->clen_autonimias }}) @endif</option>
                @endforeach

            </select>
            &nbsp; &nbsp;
            <i class="bi bi-filetype-pdf" style="cursor: pointer;"></i>
        </div>


    </div>


    <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
    <div class="row" style="margin:5px; border-radius:8px; ">
        <!-- ------------------------- FICHA GENERAL IZQUIERDA ------------------------>
        <div class="col-sm-12 col-md-4 col-lg-3 text-wrap" style="padding:10px; border-top-left-radius:8px; background-color:#CDC6B9;">
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

            <!-- ------------------------- Categoría de riesgo ------------------------>
            {{--
            <div style="text-align: center;">
                <button class="btn" style="background-color:#B1153F; color:#efebe8;
                    border-radius:0.5rem; text-align:center; padding:1px 10px; margin:5px;"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="E: Probablemente Extinta en Medio Silvestre">
                    <div style="font-size:60%; padding:-10px;">NOM-059</div>
                    <div style="font-size:80%;">- No -</div>
                </button>

                <button class="btn" style="background-color:#CD7B34; color:#efebe8;
                    border-radius:0.5rem; text-align:center; padding:1px 10px; margin:5px;"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="II: Apéndice">
                    <div style="font-size:60%; padding:-10px;">CITES</div>
                    <div style="font-size:80%;">- No -</div>
                </button>

                <button class="btn" style="background-color:#919C1B;; color:#efebe8;
                    border-radius:0.5rem; text-align:center; padding:1px 10px; margin:5px;"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="No evaluado">
                    <div style="font-size:60%; padding:-10px;">UICN</div>
                    <div style="font-size:80%;">Preocupación Menor</div>
                </button>
            </div>
            --}}

            <!-- ------------------------- Ejemplares del jardín ------------------------>
            <div class="container-fluid my-4" style="color:#64383E;font-size:90%;">
                <div class="row pb-2" style="">
                    <div class="col-12" style="text-align: center;">
                        <B>{{ $jardinData->cjar_nombre }},<br>
                            {{ $jardinData->ccam_name }}</B><br>
                        <img src="/avatar/jardines/{{ $jardinData->cjar_logo }}" style="width:40px;"><br>

                    </div>
                    <div class="col-4" style="">
                        Id {{ $jardinData->ccam_name }}:
                    </div>
                    <div class="col-8" style="">
                        @foreach ($clavos as $cla)
                            {{ $cla }},
                        @endforeach
                    </div>
                </div>
                <div class="row" style="">
                    <div class="col-4 pb-2" style="">
                        Herbario:
                    </div>
                    <div class="col-8" style="">
                        @foreach ($herbario as $her)
                            {{ $her }}
                        @endforeach
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-12 pb-2 my-4" style="text-align:center;">
                        <br>
                        <h6>Otros Jardines</h6>
                        @foreach ($otrosJardines as $otros)
                            <div class="col-12 pb-2" style="text-align:center;">
                                <a href="#" class="nolink">
                                    {{ $otros }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- ------------------------- FOTO DE LA PORTADA ------------------------>
        <div class="col-sm-12 col-md-6 col-lg-7">
            <center>
                @if($fotos->where('imgsp_cimgname','portada')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','portada')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','portada')->value('imgsp_file') }}" class="py-2 py-sm-2 py-md-0 py-lg-0 img-fluid" style="heigth:100%; max-width:80%;center">
                    </a>
                @endif
            </center>
        </div>

        <!-- ------------------------- GALERÍA DE FOTOGRAFÍAS ------------------------>
        <div class="col-sm-12 col-md-2 col-lg-2 center">
            <!-- flecha -->
            <div class="center" style="text-align: center;">
                <i class="bi bi-arrow-up-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
            </div>

            <!-- img ppal1-->
            @if($fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal1')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal2 -->
            @if($fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal2')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal3 -->
            @if($fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal3')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal4-->
            @if($fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_cimgname','ppal4')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif

            <!-- flecha -->
            <div class="center" style="text-align: center;">
                <i class="bi bi-arrow-down-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
            </div>
        </div>
    </div>




    <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE MEDIO FICHA E IMAGENES ----------------------------------------------->
    <div class="row" style="margin:5px; border-bottom-left-radius:8px;">

        <!-- -------------- Menú izquierdo ----------------->
        <div class="col-2" style="color:#efebe8;padding:40px;font-size:1.3em;background-color:#CDC6B9;">
            <H4>
                {{ $lenguas->where('clen_code',session('localeid'))->value('clen_autonimias') }}
                {{ $lenguas->where('clen_code',session('localeid'))->value('clen_lengua') }}
            </H4>
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
                            <img src="imagenes/logo-nav.png" alt="logo del Jardín Etnobotánico">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <!-- titulos -->
                    @foreach ($titulos as $titulo)
                        <div class="px-0 py-2" style="font-size:90%;">
                            <a class="nolink" href="#IrA{{ $titulo->ced_id }}tit">
                                {{ $titulo->ced_codigo}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </nav>
        </div>

        <!-- -------------- Texto central ----------------->
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="background-color:#CDC6B9;">
            <?php $num=0; ?>
            @foreach($texto as $text)
                @if($text->ced_titulo == '1')
                    <div style="margin-top: 30px;">
                        <h4>
                            <a name="IrA{{ $text->ced_id }}tit">{!! $text->ced_codigo !!}</a>
                            @if($text->ced_audio != '')
                                <?php $num++; ?>
                                <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:middle;" onclick="Escucha('/cedulas/audios/{{ $text->ced_audio }}')"></i><span style="font-size:10px;">{{ $num }} {{-- $text->ced_audio --}}</span>
                            @endif
                        </h4>
                    </div>
                @else
                    <div class="my-2">
                        {!! $text->ced_codigo !!}
                        @if($text->ced_audio != '')
                            <?php $num++; ?>
                            {{-- <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;" onclick="Escucha('/cedulas/audios/{{ $text->ced_audio }}')"></i> --}}
                            <audio id="SpAudio{{ $text->ced_id }}">
                                <source src='/cedulas/audios/{{ $text->ced_audio }}' type="audio/ogg">
                                <source src='/cedulas/audios/{{ $text->ced_audio }}' type="audio/mpeg">
                                El navegador no soporta el audio
                            </audio>
                            <i class="bi bi-volume-down-fill" id="IconPlay{{ $text->ced_id }}" onclick="playAudio('{{ $text->ced_id }}')" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;"></i>
                            <i class="bi bi-volume-mute-fill" id="IconStop{{ $text->ced_id }}" onclick="pauseAudio('{{ $text->ced_id }}')" style="cursor:pointer;display:none; font-size:200%;vertical-align:top;"></i>
                            <span style="font-size:10px;">{{ $num }} {{-- $text->ced_audio --}}</span>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>






        <!-- -------------- Imágenes derecha ----------------->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="background-color:#CDC6B9;">
            <!-- lateralvideo1 -->
            @if($fotos->where('imgsp_cimgname','lateralvideo1')->value('imgsp_file') != '')
                <video width="40" height="40" controls>
                    <source src="" type="video/ogg">
                    Tu navegador no soporta el video
                </video>

            @endif

            <!-- lateral1 -->
            @if($fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral1')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif
            <!-- lateral2 -->
            @if($fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral2')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif

            <!-- lateral3 -->
            @if($fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_cimgname','lateral3')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif

            {{-- <img src="/MapaTemp.png"
                style="width:100%;  padding:15px;"> --}}
        </div>


    </div>

    <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
    <!-- -------------------------------------- BLOQUE INFERIOR AUTORÍAS ----------------------------------------------->
    <div class="row my-4 p-3" style="margin:5px; border-radius:8px; background-color:#87796d;">
        <div class="col-12 " style="">
            Última modificación: 2024-11-23 V 4.5<br><br>
            <h4>Autores:</h4>
            Dr. Alejandro de Ávila, correo@de.alejandro.com &nbsp; | &nbsp; Jardín Etnobiológico de Oaxaca
            <br><br>
            <h4>Fuentes:</h4>
            <ul>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
                <li>Dicta quasi consectetur quo itaque sit? Repudiandae maxime ipsam, </li>
                <li>Eebitis eligendi, dolore animi, error necessitatibus minus hic sit ducimus corrupti!</li>
            </ul>
        </div>
    </div>
</div>
</div>
