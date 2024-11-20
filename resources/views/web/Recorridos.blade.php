
@extends('plantillas.PlantillaWeb')

@section('title') 
Recorridos en el Jardín
@endsection

@section('meta-description')
¿Listo para visitarnos? Conoce los horarios de nuestros recorridos diarios y todo lo que tenemos para ofrecerte.
@endsection

@section('banner')
banner-recorridos
@endsection

@section('banner-title') Planea<br>tu visita @endsection


@section('main-superior')
    <!--S1 VISITAS-->
    <section class="visitas pt-4">
        <div class="container px-4 py-5" id="bienvenido">
            <div class="row justify-content-around text-center pb-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-7 pt-5 px-4">
                    <h2 class="subtitulo">Visitas guiadas</h2>
                    <p class="texto-principal">Agradecemos su interés en nuestro trabajo, por seguridad de los
                        visitantes y de las plantas, el
                        Jardín sólo puede ser visitado en recorridos guiados. En temporadas de alta afluencia de
                        visitantes (diciembre, enero, Semana Santa y Día de Muertos) ofrecemos recorridos adicionales en
                        horario variable, según la disponibilidad de guías. </p>
                </div>
            </div>

            <div class="row justify-content-center text-center pt-4 pb-5">
                <div class="col-sm-12 col-md-auto pb-5">
                    <a href="#horarios" class="horarios">Horarios</a>
                </div>
                <div class="col-sm-12 col-md-auto">
                    <a href="#escolares" class="escolares">Visitas escolares</a>
                </div>
            </div>

            <div class="row justify-content-center galeria-recorridos py-4">
                <div class="col-sm-12 col-lg-9 ">
                    <div class=" owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-2/img-01.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-01.jpg" alt="Fachada del jardin">
                                <h3 class="w-100">Entrada del Jardín Etnobotánico de Oaxaca | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-02.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-02.jpg" alt="Inicio de recorrido">
                                <h3 class="w-100">Recorridos Día Nacional de los Jardínes Botánicos | Foto: Alma Pérez
                                    Bautista</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-03.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-03.jpg" alt="Vegetación del jardin">
                                <h3 class="w-100"> Explorando el Jardín, recorrido guiado | Foto: Ernesto de los
                                    Santos Reyes</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-04.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-04.jpg" alt="Visitantes cerca del espejo de agua">
                                <h3 class="w-100">Recorridos Día Nacional de los Jardínes Botnánicos | Foto: Alma Pérez
                                    Bautista</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--S2 RECORRIDOS-->
    <section class="recorridos" id="horarios">
        <div class="container pb-5">
            <div class="row justify-content-between py-5 px-4">
                <div class="col-md-12 col-xl-6 info-horarios">
                    <div class="row idiomas">
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-xl-12">
                                    <h2 class="subtitulo">Horarios</h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 pt-4">
                                    <h3>Recorridos en español</h3>
                                    <h4>Duración: 1 hora</h4>
                                    <p>Lunes - viernes<br>10:00, 11:00, 12:00 y 17:00 horas</p>
                                    <p>Sábados<br>10:00, 11:00 y 12:00 horas</p>
                                    <h3>Recorridos en inglés</h3>
                                    <h4>Duración: 2 horas</h4>
                                    <p>Sábados<br>10:00, 11:00 y 12:00 horas</p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 py-4">
                                    <h3>Recorridos en frances</h3>
                                    <h4>Se reapertura hasta nuevo aviso</h4>
                                    <h3>Recorridos en alemán</h3>
                                    <h4>Se reapertura hasta nuevo aviso</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row entradas pt-3">
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-xl-12">
                                    <h2 class="subtitulo">Entradas</h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6  pt-4">
                                    <h3>Recorridos en español</h3>
                                    <p>Adultos - $50.00 pesos</p>
                                    <p>Niños de 0 a 12 años - Gratis</p>
                                    <p>Estudiantes - $25.00 pesos <br>(Con credencial)</p>
                                    <p>Personas de la tercera edad - $25.00 pesos</p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 py-4">
                                    <h3>Recorridos en inglés</h3>
                                    <p>Adultos - $50.00 pesos</p>
                                    <p>Niños de 0 a 12 años - Gratis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-5 info-ubicacion">
                    <div class="row mapa">
                        <div class="col-sm-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-xl-12">
                                    <h2 class="subtitulo"> Ubicación</h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-10 col-xxl-9  py-4">
                                    <!-- el archivo marca error con width al 100%, pero no tiene problema en línea-->
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15256.577332703622!2d-96.7219608!3d17.0655913!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c722394784bab5%3A0x2dd18b7042b6eabe!2sJard%C3%ADn%20Etnobot%C3%A1nico%20de%20Oaxaca!5e0!3m2!1ses-419!2smx!4v1690404367563!5m2!1ses-419!2smx"
                                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center info-preguntas pt-3">
                        <div class="col-lg-10 col-xl-12">
                            <h3>Preguntas frecuentes</h3>
                            <div class="accordion accordion-flush-recorridos" id="accordionFlushExample">
                                <!--ITEM 1-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            ¿Dónde puedo adquirir mi boleto?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Puede conseguir su boleto una vez ingrese al Jardín
                                            y previo al inicio de cada recorrido. Por el momento no contamos con puntos
                                            de venta externos y tampoco podemos vender boletos con anticipación.</div>
                                    </div>
                                </div>
                                <!--ITEM 2-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            ¿Puedo contratar un recorrido privado?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">No ofrecemos acceso al jardín sin guía, ni
                                            recorridos privados. Estamos conscientes de que muchas personas que
                                            quisieran visitar este jardín no pueden esperar. Lo lamentamos sinceramente
                                            y
                                            pedimos su comprensión.</div>
                                    </div>
                                </div>
                                <!--ITEM 3-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            ¿Por qué se limita el número de visitantes por grupo?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Agradecemos su interés en nuestro trabajo y le
                                            informamos que, por comodidad de nuestr@s visitantes y seguridad de las
                                            plantas, el Jardín sólo puede ser visitado en recorridos guiados. Cada grupo
                                            se conforma de 30 personas y se ofrecen de lunes a sábado en diferentes
                                            horarios.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('main-inferior')
    <!--S3 RECORRIDOS-ESCOLARES-->
    <section class="recorridos-escolares" id="escolares">
        <div class="container pt-4">
            <div class="row justify-content-around py-5 px-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-5 col-xxl-4 escuelas-texto py-5">
                    <div class="row">
                        <div class="col">
                            <h2 class="subtitulo">Recorridos<br>escolares</h2>
                            <p>Ofrecemos recorridos escolares totalmente gratuitos para instituciones públicas y
                                privadas nacionales. Estos requieren de reserva previa y se imparten en los siguientes
                                horarios.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3>Horarios</h3>
                            <h4>Duración 1 hora</h4>
                            <p>Lunes - viernes<br>8:00 - 10: 00 horas <br> 13:00 - 15:00 horas <br><br>Sábados<br>8:00 -
                                10:00
                                horas</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3>Reserva</h3>
                            <p>Para agendar un recorrido en la fecha y horario de su preferencia, pedimos nos dirijan
                                una solicitud formal con al menos 3 semanas de anticipación. Esta deberá estar en papel
                                membretado de la escuela y puede enviarse al correo: etnobotanico@infinitummail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-6 col-xxl-6 galeria-escuelas pb-5">
                    <div class="row">
                        <div class="col">
                            <div class="owl-carousel owl-theme">
                                <div>
                                    <a href="imagenes/slider-3/img-01.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-01.jpg" alt="Actividades del recorrido">
                                        <h3 class="w-100">Recorridos escolares en el Jardín Etnobotánico de Oaxaca</h3>
                                    </a>
                                </div>
                                <div>
                                    <a href="imagenes/slider-3/img-02.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-02.jpg" alt="Guía y alumnos en el Jardín Etnobotánico">
                                        <h3 class="w-100">Recorridos escolares en el Jardín Etnobotánico de Oaxaca</h3>
                                    </a>
                                </div>
                                <div>
                                    <a href="imagenes/slider-3/img-03.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-03.jpg" alt="Grupo recorriendo el Jardín">
                                        <h3 class="w-100">Recorridos escolares en el Jardín Etnobotánico de Oaxaca</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection