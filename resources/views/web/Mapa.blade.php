
@extends('plantillas.PlantillaWeb')

@section('title') 
Mapa del Jardín
@endsection

@section('meta-description')
¿Necesitas un mapa? Descubre que áreas forman parte del Jardín Etnobotánico. Ven y conoce algunas de las secciones, esculturas y espacios que nos caracterizan.
@endsection

@section('banner')
banner-mapa
@endsection

@section('banner-title') 
Mapa del jardín<br>Etnobotánico 
@endsection


@section('main-superior')

    <!--S1 MAPA-->
    <section class="mapa-jardin pt-4">
        <div class="container px-4 py-5 " id="bienvenido">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 ">
                    <h2 class="subtitulo">Mapa del jardín<br>Etnobotánico </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-5">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-6 col-xxl-5 mapa-imagen">
                    <a href="imagenes/mapa-01.jpg" data-fancybox="gallery3">
                        <img src="imagenes/mapa-pre-01.png" alt="Mapa del Jardín Etnobotánico" class="w-100">
                    </a>
                </div>
                <div class="col-sm-12 col-md-10 col-lg-5 col-xl-5 col-xxl-5 mapa-lugares py-5">
                    <div class="accordion accordion-flush-mapa" id="accordionFlushExample">
                        <!--ITEM 1-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Dentro del Jardín
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div class="col-sm-6 col-md-5 col-lg-12 col-xl-6">
                                        <ol>
                                            <li>Entrada</li>
                                            <li>Salón de Orquídeas</li>
                                            <li>Taquilla</li>
                                            <li>Biblioteca</li>
                                            <li>Sanitario de Damas</li>
                                            <li>Sanitario de caballeros</li>
                                        </ol>

                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-12 col-xl-6">
                                        <ol start="7">
                                            <li>Oficinas administrativas</li>
                                            <li>Cubo de escalera</li>
                                            <li>Plazuela</li>
                                            <li>Sanitario</li>
                                            <li>Atrio</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ITEM 2-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Atractivos sobresalientes
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div class="col-sm-6 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="A">
                                            <li>Escultura de Jorge Dubón</li>
                                            <li>Escultura de Luis Zárate: Espejo de Cuanana</li>
                                            <li>Escultura de JorgeYáspick</li>
                                            <li>Invernadero</li>
                                            <li>Calzada antigua </li>
                                        </ol>
                                    </div>
                                    <div class="col-sm-5 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="A" start="6">
                                            <li>Estanque Arqueológico del siglo XVI</li>
                                            <li>Horno de cerámica</li>
                                            <li>Horno de cal</li>
                                            <li>Lavaderos</li>
                                            <li>Escultura de Francisco Toledo </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ITEM 3-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Secciones temáticas
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div class="col-sm-6 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="I">
                                            <li>Vegetación del valle de Oaxaca</li>
                                            <li>Jardín de rocas </li>
                                            <li>Plantas medicinales</li>
                                            <li>Agricultura indígena </li>
                                            <li>Huertos solares </li>
                                            <li>Bosque tropical húmedo </li>
                                        </ol>
                                    </div>
                                    <div class="col-sm-5 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="I" start="7">
                                            <li>Bosque de montaña</li>
                                            <li>Plantas relacionadas con las artes de Oaxaca</li>
                                            <li>Bosque tropical seco</li>
                                            <li>Plantas de las zonas más secas de Oaxaca </li>
                                            <li>Patio Huaje</li>
                                        </ol>
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
    <section class="lugares-sobresalientes py-5">
        <div class="container lugares pt-4">
            <div class="slide-container active">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo"> Atractivos <br> sobresalientes</h2>
                        <h3>Patio huaje</h3>
                        <p>
                            Junto con la fuente “La Sangre de Mitla”, el “Patio Huaje” fue una obra diseñada por
                            el maestro Francisco Toledo. Es una superficie de 500 metros cuadrados cubierta por
                            tierra rosa
                            y un área de piso de ladrillo. En eventos culturales y sociales tiene capacidad para
                            albergar
                            a 200 personas.</p>
                    </div>

                    <div class="image">
                        <a href="imagenes/slider-4/img-01.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-01.jpg"
                                alt="Fuente la Sangre de Mitla en el Patio huaje">
                            <h4 class="w-100">Patio huaje | Foto: Ernesto de los Santos Reyes</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo"> Atractivos <br> sobresalientes</h2>
                        <h3>Invernadero de cristal</h3>
                        <p>Conocido también como Pabellón Educativo de Orquídeas, es una estructura de 120 metros
                            cuadrados diseñada por el estudio FGP Atelier, encabezado por el arquitecto mexicano
                            Francisco Gonzáles Pulido. Este cuenta con dos cámaras al interior que regulan su
                            temperatura (templada y tropical) a través de un sistema geotermal, permitiendo así la
                            conservación de un amplio número de especies. La construcción es un ejemplo sobresaliente de
                            tecnología sustentable, ya que emplea tanto celdas solares, como válvulas de riego y
                            nebulizadores que funcionan gracias a una gran cisterna de agua pluvial.
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-02.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-02.jpg" alt="Invernadero de cristal">
                            <h4 class="w-100">Invernadero de cristal | Foto: Ernesto de los Santos Reyes</h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo"> Atractivos <br> sobresalientes</h2>
                        <h3>Escultura de Luis Zárate: <br> Espejo de Cuanana</h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, iusto cupiditate
                            tenetur porro possimus deserunt ratione, itaque repudiandae quia beatae natus odio aut vero,
                            consequatur numquam asperiores debitis? Modi, assumenda.</p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-03.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">Espejo de Cuanana, escultura de Luis Zárate | Foto: Ernesto de los Santos
                                Reyes</h4>
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
    <!--- ----------------- 2 ---------------------->
    <!--slider lugares sobresalientes-->
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