
@extends('plantillas.PlantillaWeb')

@section('title') 
Educación
@endsection

@section('meta-description')
El Jardín apoya la formación de profesionistas en diversos temas relacionados con la etnobotánica y el manejo sostenible de los recursos naturales ¡entérate! 
@endsection

@section('banner')
banner-educacion
@endsection

@section('banner-title') 
Educación
@endsection


@section('main-superior')
    <!--S1 PRESENTACION-->
    <section class="presentacion pb-5">
        <div class="container py-5 px-3" id="bienvenido">
            <div class="row justify-content-around py-5">
                <div class="col-sm-auto col-md-6 col-lg-5 text-end px-4 pb-5 mb-4">
                    <h3 class="cita">“Visitar el jardín <br>de niña me motivó a estudiar Ingeniería en Restauración
                        forestal”</h3>
                    <h4 class="autor-cita">Visitante del Jardín</h4>
                    <p class="autor-cita">Día Nacional de los Jardines Botánicos</p>
                </div>
                <div class="col-sm-auto col-md-6 col-lg-6 col-xl-5 text-start px-4">
                    <div class="row">
                        <div class="col">
                            <h2 class="subtitulo">Servicios educativos</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="texto-secundario">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                imperdiet
                                odio in cursus malesuada. Morbi at arcu ullamcorper, malesuada nibh sit amet, tempus
                                risus.
                                Donec venenatis aliquam nulla, quis semper arcu condimentum et. Aliquam mollis lacus et
                                justo
                                luctus, ut venenatis metus scelerisque. Ut leo diam, faucibus eget sem lobortis,
                                condimentum
                                lobortis sem. Donec vel elit et metus porta vehicula ut in diam.
                            </p>
                            <p class="texto-secundario">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                imperdiet
                                odio in cursus malesuada. Morbi at arcu ullamcorper, malesuada nibh sit amet, tempus
                                risus, ut venenatis metus scelerisque. Ut leo diam,Donec vel elit et metus porta vehicula ut in diam.
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('main-inferior')
    <!--S2 GALERIA SERVICIOS-EDUCATIVOS  -->
    <section class="servicios-educativos py-5">
        <div class="container espacios pt-4">
            <div class="slide-container active">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">Biblioteca</h2>
                        <p> Especializada en temas de ciencias naturales, etnobiología, ecología humana y conservación
                            ambiental, la biblioteca del Jardín Etnobotánico de Oaxaca tiene bajo su resguardo cerca de
                            10,000 publicaciones en español, inglés y otras lenguas. Entre las que se encuentran
                            diversas revistas del acervo de la Sociedad Botánica de México.</p>

                        <p>Cuenta con servicio de internet disponible para todos los usuarios, sin embargo, no ofrece
                            consulta por vía electrónica ni préstamos domiciliarios. Si desea visitarla puede ingresar
                            en los siguientes horarios.</p>

                        <h3>Horarios</h3>
                        <p>Lunes - viernes <br> 9:00 - 19: 00 horas</p>
                        <p>Sábados <br>9:00 - 13:00 horas</p>
                    </div>

                    <div class="image">
                        <a href="imagenes/slider-7/img-01.jpg" data-fancybox="gallery7">
                            <img src="imagenes/slider-7/img-pre-01.jpg"
                                alt="Interior de la Biblioteca del Jardín Etnobotánico">
                            <h4 class="w-100">Biblioteca del Jardín Etnobotánico</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo"> Herbario</h2>
                        <p>Contamos actualmente con cerca de 3100 especímenes herborizados, que representan cerca de
                            1100 especies de plantas. La mayor parte de estos especímenes sirven de respaldo para
                            documentar el conocimiento tradicional y los usos de las plantas vivas del Jardín
                            Etnobotánico de Oaxaca.</p>

                        <p>El herbario está abierto tanto a estudiantes como a promotores comunitarios e investigadores
                            académicos, previa cita por teléfono o correo electrónico.</p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-7/img-02.jpg" data-fancybox="gallery7">
                            <img src="imagenes/slider-7/img-pre-02.jpg" alt="Ficha del herbario">
                            <h4 class="w-100">Muestra del Herbario del Jardín Etnobotánico de Oaxaca</h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">Recorridos<br>escolares</h2>
                        <p>Ofrecemos recorridos escolares totalmente gratuitos para instituciones públicas y
                            privadas nacionales. Estos requieren de reserva previa y se imparten en los siguientes
                            horarios.
                        </p>
                        <h3>Horarios</h3>
                        <h4 class="duracion">Duración 1 hora</h4>
                        <p>Lunes - viernes<br>8:00 - 10: 00 horas <br> 13:00 - 15:00 horas <br><br>Sábados<br>8:00 -
                            10:00
                            horas</p>
                        <h3>Reserva</h3>
                        <p>Para agendar un recorrido en la fecha y horario de su preferencia, pedimos nos dirijan
                            una solicitud formal con al menos 3 semanas de anticipación. Esta deberá estar en papel
                            membretado de la escuela y puede enviarse al correo: etnobotanico@i nfinitummail.com</p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-7/img-03.jpg" data-fancybox="gallery7">
                            <img src="imagenes/slider-7/img-pre-03.jpg" alt="Guía y alumnos en el Jardín Etnobotánico">
                            <h4 class="w-100">Recorridos escolares en el Jardín Etnobotánico de Oaxaca</h4>
                        </a>
                    </div>
                </div>
            </div>

            <div id="prev" onclick="prev()" class="button-prev"> </div>
            <div id="next" onclick="next()" class="button-next"> </div>

        </div>

    </section>
@endsection





@section('scripts')
    <!--slider educacion-->
    <script>

        let slides = document.querySelectorAll('.slide-container');
        let index = 0;

        //next function
        function next() {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }
        //next prev
        function prev() {
            slides[index].classList.remove('active');
            index = (index - 1 + slides.length) % slides.length;
            slides[index].classList.add('active');
        }

    </script>
@endsection