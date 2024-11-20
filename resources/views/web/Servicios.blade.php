
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
Servicios
@endsection


@section('main-superior')
    <!--S1 SERVICIOS-->
    <section class="servicios pb-5">
        <div class="container px-4 py-5" id="bienvenido">
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