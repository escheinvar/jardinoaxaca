<div>
<div class="container">
    <!-- -------------------------------------- FRANJA CLASIFICACIÓN ----------------------------------------------->
    <div style="overflow:auto; background-color:#CDC6B9; border-radius:8px; margin:5px; padding:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;">
        <div style="display:inline-block;">
                {{-- Jardin: {{ $jardin }} --}}
                <b>{{ $taxo['reino'] }} &nbsp; | &nbsp;  Familia {{ $taxo['familia'] }} &nbsp; | &nbsp;  <i>{{ $taxo['sp'] }}</i></b> &nbsp; &nbsp; {{ $taxo['nombrecomun'] }} &nbsp;
        </div>
        <div style="display:inline-block;">
            {{-- <span class="d-none d-xl-inline-block">xl ExtraGrande</span>
            <span class="d-none d-lg-inline-block d-xl-none">lg Grande</span>
            <span class="d-none d-md-inline-block d-lg-none">md Mediano</span>
            <span class="d-none d-sm-inline-block d-md-none ">sm Chico</span>
            <span class="d-xs-block d-sm-none">sm Extrachico</span> --}}
        </div>


        <div style="float: right;">
            Idioma:
            <select wire:change="idiomas()" wire:model="idioma" id="MiIdioma" class="form-control lenguas" style="width:150px; display:inline-block;">
                <option value="2">Español</option>
                {{-- <option value="6">Tu`un Savi (Mixteco)</option> --}}
                <option value="7">Ombeayiüts (Huave)</option>
                <option value="8">Diidxazá (Zapoteco Istmo)</option>
            </select>
            &nbsp; &nbsp;
            <i class="bi bi-filetype-pdf" style="cursor: pointer;"></i>
        </div>


    </div>


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
                        <B>Jardín Etnobiológico de Oaxaca</B><br>
                        <img src="/avatar/jardines/JebOax.png" style="width:40px;"><br>
                    </div>
                    <div class="col-4" style="">
                        Id jardín:
                    </div>
                    <div class="col-8" style="">
                        695, 698, 966, 2525
                    </div>
                </div>
                <div class="row" style="">
                    <div class="col-4 pb-2" style="">
                        Herbario:
                    </div>
                    <div class="col-8" style="">
                        1050, 1099, 1085, 1045, 1398,  1765
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-12 pb-2 my-4" style="text-align:center;">

                    </div>
                    <div class="col-12 pb-2" style="text-align:center;">
                        <b>Jardín Comunitario de Matatlán</b>
                        <!--img src="/avatar/jardines/Matatlan.png" style="width:30px;"-->
                        <br>
                        3452, 654
                    </div>
                    <div class="col-12 pb-2" style="text-align:center;">
                        <b>Parque Primavera</b>
                        <!--img src="/avatar/jardines/default.png" style="width:40px;"-->
                        <br>
                        9923, 456
                    </div>
                </div>
            </div>
        </div>

        <!-- ------------------------- FOTO DE LA PORTADA ------------------------>
        <div class="col-sm-12 col-md-6 col-lg-7">
            <center>
                @if($fotos->where('imgsp_label','16')->value('imgsp_file') != '')
                    <a href="/cedulas/{{ $fotos->where('imgsp_label','16')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{ $fotos->where('imgsp_label','16')->value('imgsp_file') }}" class="py-2 py-sm-2 py-md-0 py-lg-0 img-fluid" style="heigth:100%; max-width:80%;center">
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
            @if($fotos->where('imgsp_label','17')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_label','17')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_label','17')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal2 -->
            @if($fotos->where('imgsp_label','18')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_label','18')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_label','18')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal3 -->
            @if($fotos->where('imgsp_label','19')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_label','19')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_label','19')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif
            <!-- img ppal4-->
            @if($fotos->where('imgsp_label','20')->value('imgsp_file') != '' )
                <div class="center">
                    <a href="/cedulas/{{ $fotos->where('imgsp_label','20')->value('imgsp_file') }}" target="new">
                        <img src="/cedulas/{{$fotos->where('imgsp_label','20')->value('imgsp_file')  }}" style="cursor: pointer;" class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                    </a>
                </div>
            @endif

            <!-- flecha -->
            <div class="center" style="text-align: center;">
                <i class="bi bi-arrow-down-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
            </div>
        </div>
    </div>




    <!-- -------------------------------------- FRANJA INFO ----------------------------------------------->
    <div class="row" style="margin:5px; border-bottom-left-radius:8px;">

        <!-- -------------- Menú izquierdo ----------------->
        <div class="col-2" style="color:#efebe8;padding:40px;font-size:1.3em;background-color:#CDC6B9;">
            <nav class="navbar navbar-expand-md">
                <!-- --------- Menú Hamburguesa -------------- -->
                <button class="navbar-toggler col-xs-12 col-sm-12 col-md-12 col-lg-12"
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
            @foreach($texto as $text)
                @if($text->ced_titulo == '1')
                    <div style="margin-top: 30px;">
                        <h4>
                            <a name="IrA{{ $text->ced_id }}tit">{!! $text->ced_codigo !!}</a>
                            @if($text->ced_audio != '')
                                <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:middle;" onclick="Escucha('/cedulas/{{ $text->ced_audio }}')"></i>
                            @endif
                        </h4>
                    </div>
                @else
                    <div class="my-2">
                        {!! $text->ced_codigo !!}
                        @if($text->ced_audio != '')
                            <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;" onclick="Escucha('/cedulas/{{ $text->ced_audio }}')"></i>
                        @endif
                    </div>
                @endif


            @endforeach

            {{-- @foreach ($titulos as $tit)
                <div class="my-5">
                    <!-- muestra título -->
                    <a name="{{ $tit->tit_name }}">
                        <h5>{{ $tit->tit_titulo }}</h5>
                    </a>
                    <!-- apila párrafos -->
                    @foreach ($texto as $text)
                        <div class="my-2">
                            @if($text->ced_titulo == $tit->tit_id)
                                {!! $text->ced_codigo !!}
                                @if($text->ced_audio != '')
                                    <i class="bi bi-volume-down-fill" style="cursor:pointer;display:inline; font-size:200%;vertical-align:top;" onclick="Escucha('/cedulas/{{ $text->ced_audio }}')"></i>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach --}}
        </div>






        <!-- -------------- Imágenes derecha ----------------->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="background-color:#CDC6B9;">
            @if($fotos->where('imgsp_label','24')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_label','24')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_label','24')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif

            @if($fotos->where('imgsp_label','25')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_label','25')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_label','25')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif


            @if($fotos->where('imgsp_label','26')->value('imgsp_file') != '')
                <a href="/cedulas/{{ $fotos->where('imgsp_label','26')->value('imgsp_file') }}" target="new">
                    <img src="/cedulas/{{ $fotos->where('imgsp_label','26')->value('imgsp_file') }}" style="width:100%;  padding:15px;">
                </a>
            @endif

            {{-- <img src="/MapaTemp.png"
                style="width:100%;  padding:15px;"> --}}
        </div>


    </div>


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
