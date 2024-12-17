
@extends('plantillas.PlantillaWeb')

@section('title') 
Servicios
@endsection

@section('meta-description')
Brindamos apoyo a iniciativas comunitarias y a la formación de profesionistas relacionados a la etnobotánica. Contamos con una biblioteca especializada y un Herbario. 
@endsection

@section('banner')
banner-servicios
@endsection

@section('banner-title') 
Colecciones
@endsection


@section('main-superior')
    <!--S1 SERVICIOS-->



        

    <section class="servicios pb-5">
        <div class="container px-4 py-5" id="bienvenido">

            <div class="row justify-content-around text-center pb-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-7 pt-5 px-4">
                    <h2 class="subtitulo">Colección</h2>
                    <p class="texto-principal">El Jardín Etnobiológico muestra en vivo cientos de especies de plantas,
                        originarias de Oaxaca. Comenzamos a plantarlas en julio de 1998 en lo que fue un cuartel militar. </p>
                </div>
            </div>

            <div class="row count-area text-center pt-3" data-diff="100">
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <!--i class="fa fa-home"></i--></div>
                        <div class="count-digit">2</div>
                        <div class="count-title">Hectáreas</div>
                        <div class="count-description">Área plantadas <br> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <!--i class="fa fa-graduation-cap"></i--></div>
                        <div class="count-digit">100</div>
                        <div class="count-title">Comunidades y ejidos</div>
                        <div class="count-description">Aportaron plantas, <br> piedra y tierra al Jardín</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <!--i class="fa fa-user"></i--></div>
                        <div class="count-digit">950</div>
                        <div class="count-title">Especies plantadas</div>
                        <div class="count-description">10% de la flora<br>del estado</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-area-content">
                        <div class="count-icon"> <!--i class="fa fa-book"></i--></div>
                        <div class="count-digit">1300</div>
                        <div class="count-title">Especies restantes</div>
                        <div class="count-description">Para terminar<br>el Jardín</div>
                    </div>
                </div>
            </div>






            <div class="row justify-content-end">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-6 pt-5 px-4">
                    <h2 class="subtitulo">Apoyo comunitario</h2>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-6 py-2 px-4">
                    <p class="texto-secundario">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis
                        reprehenderit esse neque odit, vitae optio porro illo tempore, expedita nesciunt aspernatur!
                        Minus cumque illum quaerat a impedit, sit excepturi vel. Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur
                        reprehenderit deserunt minus tenetur debitis officiis sequi hic, ipsa molestiae tempore
                        impedit
                        unde amet aperiam illum voluptate vel in, perferendis quas!Nihil iusto explicabo, quam
                        sapiente
                        laudantium voluptates fuga repellendus
                        repellat, ab perspiciatis illo mollitia ipsam itaque fugit voluptatem. Cum error est
                        ducimus.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('main-inferior')
    <!--S2 GALERIA-SERVICIOS-->
    <section class="galeria-servicios pt-5">
        <div class="container py-5 px-4">
            <div class="row pb-5">
                <div class="col">
                    <h2>Actividades del Jardín Etnobotánico</h2>
                    <div class="owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-6/img-01.jpg" data-fancybox="gallery6">
                                <img src="imagenes/slider-6/img-pre-01.jpg" alt="Día de los Jardínes Botánicos">
                                <h3 class="w-100"> Día Nacional de los Jardínes Botánicos| Foto: Alma Pérez Bautista
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-6/img-02.jpg" data-fancybox="gallery6">
                                <img src="imagenes/slider-6/img-pre-02.jpg" alt="Día de los Jardínes Botánicos">
                                <h3 class="w-100"> Día Nacional de los Jardínes Botánicos| Foto: Alma Pérez Bautista
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-6/img-03.jpg" data-fancybox="gallery6">
                                <img src="imagenes/slider-6/img-pre-03.jpg"
                                    alt="Taller del Día de los Jardínes Botánicos">
                                <h3 class="w-100">Taller: Gilá Naquitz y el origen de la agricultura, Dra. Xitlali
                                    Aguirre Dugua | Foto: Alma Pérez Bautista</h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-6/img-04.jpg" data-fancybox="gallery6">
                                <img src="imagenes/slider-6/img-pre-04.jpg"
                                    alt="Taller infantil del Día de los Jardínes Botánicos">
                                <h3 class="w-100">Taller: Manualidades con hojas, flores y Semillas del Jardín. Sra
                                    Mariana Muñoz Herrera | Foto: Alma Pérez Bautista</h3>
                            </a>
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