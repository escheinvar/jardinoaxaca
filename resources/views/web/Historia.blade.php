
@extends('plantillas.PlantillaWeb')

@section('title') 
Historia
@endsection

@section('meta-description')
Propuesto en 1993, el Jardín Etnobotánico de Oaxaca nace con el objetivo de mostrar en vivo las relaciones entra la historia natural de Oaxaca y su diversidad cultural.
@endsection

@section('banner')
banner-historia
@endsection

@section('banner-title') 
Historia
@endsection


@section('main-superior')
    <section class="presentacion pt-4">
        <div class="container py-5 px-4" id="bienvenido">
            <div class="row justify-content-around text-center pb-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-7 pt-5 px-4">
                    <h2 class="subtitulo">Colección</h2>
                    <p class="texto-principal">El Jardín Etnobotánico muestra en vivo cientos de especies de plantas,
                        todas ellas
                        originarias de Oaxaca. Comenzamos a plantarlas en julio de 1998, y planeamos terminar la
                        plantación de especies perennes próximamente. </p>
                </div>
            </div>

            <div class="row count-area text-center pt-3" data-diff="100">
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <i class="fa fa-home"></i></div>
                        <div class="count-digit">2</div>
                        <div class="count-title">Hectáreas</div>
                        <div class="count-description">Área plantada <br> a la fecha</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <i class="fa fa-graduation-cap"></i></div>
                        <div class="count-digit">100</div>
                        <div class="count-title">Comunidades y ejidos</div>
                        <div class="count-description">Aportaron plantas, <br> piedra y tierra al Jardín</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <i class="fa fa-user"></i></div>
                        <div class="count-digit">950</div>
                        <div class="count-title">Especies plantadas</div>
                        <div class="count-description">10% de la flora<br>del estado</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <i class="fa fa-book"></i></div>
                        <div class="count-digit">1300</div>
                        <div class="count-title">Especies restantes</div>
                        <div class="count-description">Para terminar<br>el Jardín</div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--S2 HISTORIA-->
    <section class="historia">
        <div class="container py-5 px-3">
            <div class="row justify-content-around py-5">
                <div class="col-sm-auto col-md-6 col-lg-5 text-end px-4 mb-4">
                    <h3 class="cita">“Oaxaca no sólo es la entidad donde viven más grupos étnicos y donde se hablan más
                        lenguas
                        indígenas, es también el estado donde existen más especies de plantas y animales.” </h3>
                </div>
                <div class="col-sm-auto col-md-6 col-lg-6 col-xl-5 text-start py-2 px-4">
                    <p class="texto-secundario">El Jardín Etnobotánico de Oaxaca fue propuesto en 1993 por iniciativa
                        del maestro Francisco
                        Toledo y de la asociación civil PRO-Oaxaca (Patronato para la Defensa y Conservación del
                        Patrimonio Cultural y Natural de Oaxaca, A.C)</p>

                    <p class="texto-secundario">El terreno forma parte de la antigua huerta del convento de Santo
                        Domingo de Guzmán
                        construido en
                        los siglos XVI y XVII para los frailes dominicos y hoy en día, además de dedicarse a
                        recolectar,
                        plantar, cuidar y propagar plantas nativas del estado,
                        este espacio cuenta con un vivero, un banco de semillas, un herbario y una biblioteca
                        especializada, así como, recorridos diarios abiertos al público general e instituciones
                        educativas.</p>

                    <h2 class="subtitulo">Estructura institucional</h2>

                    <p class="texto-secundario">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore sit
                        debitis, magnam, exercitationem perferendis nihil labore veniam sed eaque sunt dignissimos, iste
                        fugit. Doloremque natus delectus id explicabo quis consectetur? Lorem ipsum dolor sit, amet
                        consectetur adipisicing elit. Suscipit consequuntur omnis obcaecati soluta iste perferendis
                        libero debitis pariatur asperiores! Quam reiciendis dolore error tempore incidunt, placeat
                        soluta repellendus qui nisi.</p>
                </div>
            </div>
        </div>
    </section>
@endsection<!--S1 COLECCION-->




@section('main-inferior')
    <!--S3 GALERIA-HISTORIA-->
    <section class="galeria-historia pt-5">
        <div class="container py-5 px-4">
            <div class="row pb-5">
                <div class="col">
                    <h2>Antiguo huerto del Ex Convento de Santo Domingo de Guzmán </h2>
                    <div class="owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-5/img-01.jpg" data-fancybox="gallery5">
                                <img src="imagenes/slider-5/img-pre-01.jpg" alt="Área escultórica">
                                <h3 class="w-100"> Horno de cerámica del Ex Convento de Santo Domingo | Foto: Ernesto de
                                    los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-5/img-02.jpg" data-fancybox="gallery5">
                                <img src="imagenes/slider-5/img-pre-02.jpg" alt="Hornos de cal">
                                <h3 class="w-100">Hornos de cal del Ex Convento de Santo Domingo| Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <div>
                                <a href="imagenes/slider-5/img-03.jpg" data-fancybox="gallery5">
                                    <img src="imagenes/slider-5/img-pre-03.jpg" alt="Horno del Ex Convento">
                                    <h3 class="w-100">Horno del ex Ex Convento de Santo Domingo | Foto: Ernesto de los
                                        Santos Reyes</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <!--Contador colección-->
    <script>
        function visible(partial) {
            var $t = partial,
                $w = jQuery(window),
                viewTop = $w.scrollTop(),
                viewBottom = viewTop + $w.height(),
                _top = $t.offset().top,
                _bottom = _top + $t.height(),
                compareTop = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;

            return (
                compareBottom <= viewBottom && compareTop >= viewTop && $t.is(":visible")
            );
        }

        $(window).scroll(function () {
            if (visible($(".count-digit"))) {
                if ($(".count-digit").hasClass("counter-loaded")) return;
                $(".count-digit").addClass("counter-loaded");

                $(".count-digit").each(function () {
                    var $this = $(this);
                    jQuery({ Counter: 0 }).animate(
                        { Counter: $this.text() },
                        {
                            duration: 5000,
                            easing: "swing",
                            step: function () {
                                $this.text(Math.ceil(this.Counter));
                            }
                        }
                    );
                });
            }
        });

    </script>
@endsection