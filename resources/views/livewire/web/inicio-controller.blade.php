@section('title') Jardín Etnobiológico de Oaxaca @endsection

@section('meta-description') "Somos un espacio cultural dedicado a la conservación y propagación de plantas nativas de Oaxaca. ¡Ven y conoce parte de la gran diversidad e historia del estado!" @endsection

@section('banner-title') 
    @if(session('locale')=='en')
        Ethnobiological <br>Garden <br>of Oaxaca
    @elseif(session('locale')=='pt')
        Jardim <br>Etnobiológico <br>de Oaxaca
    @elseif(session('locale')=='es_mix_bj') 
        Jardîn <br>Etnobiológìcò <br>Ñuu Ndǔvá
    @else
        Jardín <br>Etnobiológico<br> de Oaxaca 
        
        <i class="bi bi-volume-up-fill" onclick="VerNoVer('audio','0')"></i>
        <audio controls  id="sale_audio0" style="display:none;">                                
            <source src="audio/es/01inicio_00.ogg" type="audio/ogg" >
        </audio>
    @endif
@endsection

@section('banner') banner-index @endsection

<div>
    <!--S1 PRESENTACION-->
    <section class="presentacion pt-4">
        <div class="container pt-5 px-3" id="bienvenido">
            <div>
                @include('plantillas/plant_locale')
            </div>

            <div class="row justify-content-around py-5">
                <div class="col-sm-auto col-md-6 col-lg-5 text-end px-4 mb-4">
                    <h2 class="cita">
                        @if(session('locale')=='en')
                            "A space created to show live the relationships between the natural history of Oaxaca and its cultural diversity"
                        @elseif(session('locale')=='pt')
                            "Um espaço criado para mostrar ao vivo as relações entre a história natural de Oaxaca e sua diversidade cultural"
                        @elseif(session('locale')=='es_mix_bj')
                            "kùva’à ñà ñà kuvi kundaa ini yó nìsaa xíniñú’ú na ñuu yó Ñuu Ndǔvá ndi’í mií nùú itún ìkù xí’ín ndi’i ka ñà’a kána tiañu ikú ñuu yó"
                        @else
                            “Un espacio creado para mostrar en vivo las relaciones entre la historia natural de Oaxaca y su diversidad cultural”
                            <i class="bi bi-volume-up-fill" onclick="VerNoVer('audio','1')"></i>
                            <audio controls id="sale_audio1" style="display:none;">                                
                                <source src="audio/es/01inicio_01.ogg" type="audio/ogg" >
                            </audio>
                        @endif    
                    </h2>
                    <h4 class="autor-cita">Dr. Alejandro de Ávila Blomberg</h4>
                    <p class="autor-cita">
                        @if(session('locale')=='en')
                            Founding Director of the Ethnobiological Garden
                        @elseif(session('locale')=='pt')
                            Diretor Fundador do Jardim Etnobiológico
                        @else
                            Director Fundador del Jardín Etnobiológico
                            <i class="bi bi-volume-up-fill" onclick="VerNoVer('audio','3')"></i>
                            <audio controls id="sale_audio3" style="display:none;">                                
                                <source src="audio/es/01inicio_03.ogg" type="audio/ogg" >
                            </audio>
                        @endif
                    </p>
                </div>
                <div class="col-sm-auto col-md-6 col-lg-6 col-xl-5 text-start py-2 px-4">
                    <p class="texto-principal">  
                        @if(session('locale')=='en')
                            Proposed in 1993 as a civil society initiative, it has hundreds of species donated by Oaxacan communities
                            and with which we safeguard a small part of the immense biocultural heritage of the state of Oaxaca.
                        @elseif(session('locale')=='pt')
                            Proposto em 1993 como uma iniciativa da sociedade civil, conta com centenas de espécies doadas por comunidades de Oaxaca
                            e com a qual protegemos uma pequena parte do imenso patrimônio biocultural do estado de Oaxaca.
                        @else
                            Propuesto en 1993 como iniciativa de la sociedad civil, cuenta con cientos de especies donadas por las comunidades oaxaqueñas
                            y con las que resguardamos una pequeña parte del inmenso patrimonio biocultural del estado de Oaxaca.
                            <i class="bi bi-volume-up-fill" onclick="VerNoVer('audio','2')"></i>
                            <audio controls  id="sale_audio2" style="display:none;">                                
                                <source src="audio/es/01inicio_02.ogg" type="audio/ogg" >
                            </audio>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--S2 ENTERATE-->
    <section class="enterate pt-4">
        <div class="container py-5 px-4">
            <div class="row pb-5">
                <div class="col-sm-10 col-md-8 col-lg-5 enterate-titulo">
                    <h3 class="subtitulo">
                        @if(session('locale')=='en')
                            Find out
                        @elseif(session('locale')=='pt')
                            Descobrir
                        @else
                            Entérate
                        @endif
                    </h3>                 
                </div>
            </div>
            <div class="row pb-5" >
                <div class="col wrapper pb-5">
                    <div class="home-hero">
                        <a href="/recorridos" class="recorridos-menu">
                            @if(session('locale')=='en')
                                <h3>Tours</h3>
                                <p>Schedules | Tickets | Location</p>
                            @elseif(session('locale')=='pt')
                                <h3>Passeios</h3>
                                <p>Horários | Ingressos | Localização</p>
                            @else
                                <h3>Recorridos</h3>
                                <p>Horarios | Entradas | Ubicación</p>
                            @endif
                        </a>

                        <a href="/mapa" class="mapa-menu">
                            @if(session('locale')=='en')
                                <h3>Map</h3>
                                <p>Zones | Highlights</p>
                            @elseif(session('locale')=='pt')
                                <h3>Mapa</h3>
                                <p>Zonas | Lugares excepcionais</p>
                            @else
                                <h3>Mapa</h3>
                                <p>Zonas | Lugares sobresalientes</p>
                            @endif
                        </a>

                        <a href="/actividades" class="actividades-menu">
                            @if(session('locale')=='en')
                                <h3>Activities</h3>
                                <p>Announcements | Upcoming events</p>
                            @elseif(session('locale')=='pt')
                                <h3>Atividades</h3>
                                <p>Avisos | Próximos eventos</p>
                            @else
                                <h3>Actividades</h3>
                                <p>Avisos | Próximos eventos</p>
                            @endif
                        </a>

                        <a href="/educacion" class="educacion-menu">
                            @if(session('locale')=='en')
                                <h3>Education</h3>
                                <p>Library | Herbarium | Programs</p>
                            @elseif(session('locale')=='pt')
                                <h3>Educação</h3>
                                <p>Biblioteca | Herbário | Programas</p>
                            @else
                                <h3>Educación</h3>
                                <p>Biblioteca | Herbario | Programas</p>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-2">
                    <!-- ---------------- Espacio para algo -->
                </div>
            </div>
        </div>
    </section>



    <!--S3 GALERIA-INICIO-->
    <section class="galeria-inicio pt-5">
        <div class="container py-5 px-4">
            <div class="row pb-5">
                <div class="col">
                    <h2>
                        @if(session('locale')=='en')
                            Visit the Ethnobiological Garden of Oaxaca
                        @elseif(session('locale')=='pt')
                            Visite o Jardim Etnobiológico de Oaxaca
                        @else
                            Visita el Jardín Etnobiológico de Oaxaca
                        @endif
                    </h2>
                    <div class="owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-1/img-01.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-01.jpg" alt="Árboles del Jardín">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-02.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-05.webp" alt="Camino de piedra">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif                                   
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-03.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-06.webp" alt="Espejo de agua">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-04.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-07.webp" alt="Cactáceas">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-04.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-08.webp" alt="Cactáceas">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-04.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-09.webp" alt="Cactáceas">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-04.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-10.webp" alt="Cactáceas">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Inside the Ethnobiological Garden of Oaxaca | Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Interior do Jardim Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @else
                                        Interior del Jardín Etnobiológico de Oaxaca | Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
