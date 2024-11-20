@extends('plantillas.PlantillaWeb')

@section('title') Jardín Etnobiológico de Oaxaca @endsection

@section('meta-description') "Somos un espacio cultural dedicado a la conservación y propagación de plantas nativas de Oaxaca. ¡Ven y conoce parte de la gran diversidad e historia del estado!" @endsection

@section('banner-title') Jardín <br>Etnobiológico<br> de Oaxaca @endsection

@section('banner') banner-index @endsection


@section('main-superior')
    <!--S1 PRESEN@TACION-->
    <section class="presentacion pt-4">
        <div class="container pt-5 px-3" id="bienvenido">
            <div class="row justify-content-around py-5">
                <div class="col-sm-auto col-md-6 col-lg-5 text-end px-4 mb-4">
                    <h2 class="cita">“Un espacio creado para mostrar en vivo las relaciones entre la historia natural de
                        Oaxaca y su
                        diversidad cultural”</h2>
                    <h4 class="autor-cita">Dr. Alejandro de Ávila Blomberg</h4>
                    <p class="autor-cita">Director del Jardín Etnobotánico</p>
                </div>
                <div class="col-sm-auto col-md-6 col-lg-6 col-xl-5 text-start py-2 px-4">
                    <p class="texto-principal"> Fue propuesto en
                        1993 como iniciativa de la sociedad civil y hoy en día, con más de 950 especies plantadas,
                        representa parte de la gran diversidad de climas, formaciones geológicas y tipos de
                        vegetación que caracterizan al estado.
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
                    <h3 class="subtitulo">Entérate</h3>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col wrapper pb-5">
                    <div class="home-hero">
                        <a href="/recorridos" class="recorridos-menu">
                            <h3>Recorridos</h3>
                            <p>Horarios | Entradas | Ubicación</p>
                        </a>

                        <a href="/mapa" class="mapa-menu">
                            <h3>Mapa</h3>
                            <p>Zonas | Lugares sobresalientes</p>
                        </a>

                        <a href="/actividades" class="actividades-menu">
                            <h3>Actividades</h3>
                            <p>Avisos | Próximos eventos</p>
                        </a>

                        <a href="/educacion" class="educacion-menu">
                            <h3>Educación</h3>
                            <p>Biblioteca | Herbario | Programas</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('main-inferior')
    <!--S3 GALERIA-INICIO-->
    <section class="galeria-inicio pt-5">
        <div class="container py-5 px-4">
            <div class="row pb-5">
                <div class="col">
                    <h2>Visita el Jardín Etnobotánico de Oaxaca</h2>
                    <div class="owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-1/img-01.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-01.jpg" alt="Árboles del Jardín">
                                <h3 class="w-100">Interior del Jardín Etnobotánico de Oaxaca | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-02.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-02.jpg" alt="Camino de piedra">
                                <h3 class="w-100">Interior del Jardín Etnobotánico de Oaxaca | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-03.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-03.jpg" alt="Espejo de agua">
                                <h3 class="w-100">Interior del Jardín Etnobotánico de Oaxaca | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-1/img-04.jpg" data-fancybox="gallery">
                                <img src="imagenes/slider-1/img-pre-04.jpg" alt="Cactáceas">
                                <h3 class="w-100">Interior del Jardín Etnobotánico de Oaxaca | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection