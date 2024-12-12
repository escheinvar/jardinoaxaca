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
    @if(session('locale')=='en')
        Map of the <br>Ethnobiological Garden
    @elseif(session('locale')=='pt')
        Mapa do jardim<br>Etnobiológico
    @else
        Mapa del jardín<br>Etnobiológico 
    @endif
@endsection

<div>
    <!--S1 MAPA-->
    <section class="mapa-jardin pt-4">
        <div class="container px-4 py-5 " id="bienvenido">
            <div>
                @include('plantillas/plant_locale')
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 ">
                    <h2 wire:click="cambiaFoto('general')" class="subtitulo">
                        @if(session('locale')=='en')
                            Map of the Ethnobiological Garden
                        @elseif(session('locale')=='pt')
                            Mapa do jardim<br>Etnobiológico
                        @else
                            Mapa del jardín<br>Etnobiológico 
                        @endif
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-5">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-6 col-xxl-5 mapa-imagen">
                    <a href="imagenes/mapa-01.jpg" data-fancybox="gallery3">
                        <img src={{$mapa}} alt="Mapa del Jardín Etnobotánico" class="w-100">
                    </a>
                </div>
                <div class="col-sm-12 col-md-10 col-lg-5 col-xl-5 col-xxl-5 mapa-lugares py-5">
                    <div class="accordion accordion-flush-mapa" id="accordionFlushExample">
                        <!--ITEM 1-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button wire:click="cambiaFoto('dentro')" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    @if(session('locale')=='en')
                                        Inside the Garden
                                    @elseif(session('locale')=='pt')
                                        Dentro do jardim
                                    @else
                                        Dentro del Jardín
                                    @endif
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div clas                                                                                                                                                                                                                                                                       s="col-sm-6 col-md-5 col-lg-12 col-xl-6">
                                        <ol>
                                            @if(session('locale')=='en')
                                                <li>Entry </li>
                                                <li>Orchid Room </li>
                                                <li>Box Office </li>
                                                <li>Library </li>
                                                <li>Ladies' Restroom </li>
                                                <li>Men's restroom </li>
                                            @elseif(session('locale')=='pt')
                                                <li>Entrada</li>
                                                <li>Sala das Orquídeas </li>
                                                <li>Bilheteria </li>
                                                <li>Biblioteca </li>
                                                <li>Banheiro feminino </li>
                                                <li>Banheiro masculino </li>
                                            @else
                                                <li>Entrada </li>
                                                <li>Salón de Orquídeas </li>
                                                <li>Taquilla </li>
                                                <li>Biblioteca </li>
                                                <li>Sanitario de Damas </li>
                                                <li>Sanitario de caballeros </li>
                                            @endif
                                        </ol>

                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-12 col-xl-6">
                                        <ol start="7">
                                            @if(session('locale')=='en')
                                                <li>Administrative offices</li>
                                                <li>Staircase</li>
                                                <li>Plazuela</li>
                                                <li>Sanitary</li>
                                                <li>Atrium</li>
                                            @elseif(session('locale')=='pt')
                                                <li>Escritórios administrativos</li>
                                                <li>Escadaria</li>
                                                <li>Plazuela</li>
                                                <li>Sanitário</li>
                                                <li>Átrio</li>
                                            @else
                                                <li>Oficinas administrativas</li>
                                                <li>Cubo de escalera</li>
                                                <li>Plazuela</li>
                                                <li>Sanitario</li>
                                                <li>Atrio</li>
                                            @endif
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ITEM 2-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button wire:click="cambiaFoto('sobresalientes')" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    @if(session('locale')=='en')
                                        Outstanding attractions
                                    @elseif(session('locale')=='pt')
                                        Atrações marcantes
                                    @else
                                        Atractivos sobresalientes
                                    @endif
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div class="col-sm-6 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="A">
                                            @if(session('locale')=='en')
                                                <li>Sculpture by Jorge Dubón</li>
                                                <li>Sculpture by Luis Zárate: Cuanana Mirror</li>
                                                <li>Sculpture by JorgeYáspick</li>
                                                <li>Greenhouse</li>
                                                <li>Old road </li>
                                            @elseif(session('locale')=='pt')
                                                <li>Escultura de Jorge Dubón</li>
                                                <li>Escultura de Luis Zárate: Espelho Cuanana</li>
                                                <li>Escultura de JorgeYáspick</li>
                                                <li>Estufa</li>
                                                <li>Estrada antiga </li>
                                            @else
                                                <li>Escultura de Jorge Dubón</li>
                                                <li>Escultura de Luis Zárate: Espejo de Cuanana</li>
                                                <li>Escultura de JorgeYáspick</li>
                                                <li>Invernadero</li>
                                                <li>Calzada antigua </li>
                                            @endif
                                        </ol>
                                    </div>
                                    <div class="col-sm-5 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="A" start="6">
                                            @if(session('locale')=='en')
                                                <li>16th century archaeological pond</li>
                                                <li>Ceramic kiln</li>
                                                <li>Lime kiln</li>
                                                <li>Washrooms</li>
                                                <li>Sculpture by Francisco Toledo </li>
                                            @elseif(session('locale')=='pt')
                                                <li>Lago Arqueológico do século XVI</li>
                                                <li>Forno de cerâmica</li>
                                                <li>Forno de cal</li>
                                                <li>Lavanderias</li>
                                                <li>Escultura de Francisco Toledo </li>
                                            @else
                                                <li>Estanque Arqueológico del siglo XVI</li>
                                                <li>Horno de cerámica</li>
                                                <li>Horno de cal</li>
                                                <li>Lavaderos</li>
                                                <li>Escultura de Francisco Toledo </li>
                                            @endif
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ITEM 3-->
                        <div class="accordion-item-mapa">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button wire:click="cambiaFoto('secciones')" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    @if(session('locale')=='en')
                                        Thematic sections
                                    @elseif(session('locale')=='pt')
                                        Seções temáticas
                                    @else
                                        Secciones temáticas
                                    @endif
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="row accordion-body pt-4">
                                    <div class="col-sm-6 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="I">
                                            @if(session('locale')=='en')
                                                <li>Vegetation of the Oaxaca Valley</li>
                                                <li>Rock garden </li>
                                                <li>Medicinal plants</li>
                                                <li>Indigenous agriculture </li>
                                                <li>Solar gardens </li>
                                                <li>Tropical rainforest </li>
                                            @elseif(session('locale')=='pt')
                                                <li>Vegetação do Vale de Oaxaca</li>
                                                <li>Jardim de pedras </li>
                                                <li>Plantas medicinais</li>
                                                <li>Agricultura indígena </li>
                                                <li>Jardins solares </li>
                                                <li>Floresta tropical úmida </li>
                                            @else
                                                <li>Vegetación del valle de Oaxaca</li>
                                                <li>Jardín de rocas </li>
                                                <li>Plantas medicinales</li>
                                                <li>Agricultura indígena </li>
                                                <li>Huertos solares </li>
                                                <li>Bosque tropical húmedo </li>
                                            @endif
                                        </ol>
                                    </div>
                                    <div class="col-sm-5 col-md-6 col-lg-12 col-xl-6">
                                        <ol type="I" start="7">
                                            @if(session('locale')=='en')
                                                <li>Mountain forest</li>
                                                <li>Plants related to the arts of Oaxaca</li>
                                                <li>Dry tropical forest</li>
                                                <li>Plants from the driest areas of Oaxaca </li>
                                                <li>Patio Huaje</li>
                                            @elseif(session('locale')=='pt')
                                                <li>Floresta montanhosa</li>
                                                <li>Plantas relacionadas às artes de Oaxaca</li>
                                                <li>Floresta tropical seca</li>
                                                <li>Plantas das áreas mais secas de Oaxaca </li>
                                                <li>Pátio Huaje</li>
                                            @else
                                                <li>Bosque de montaña</li>
                                                <li>Plantas relacionadas con las artes de Oaxaca</li>
                                                <li>Bosque tropical seco</li>
                                                <li>Plantas de las zonas más secas de Oaxaca </li>
                                                <li>Patio Huaje</li>
                                            @endif
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





    <section class="lugares-sobresalientes py-5">
        <div class="container lugares pt-4">
            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Patio el huaje ------------------------------->
            <div class="slide-container active">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            Patio del Guaje y Sangre de Mitla
                        </h3>
                        <p>
                            @if(session('locale')=='en')
                                Located above the Macedonio Alcalá street gate, next to the former Santo Domingo convent,
                                Patio del Guaje it is a beautiful space designed by the master Francisco Toledo. Decorated with red clay tiles
                                with two important elements at its ends: the Guaje tree, a majestic legume that gives its name to the city of Oaxaca and
                                the wonderful sculpture "La Sangre de Mitla" also by the Master Toledo.<br>
                                "The Blood of Mitla" is a fountain made from a sabino tree covered in volcanic mica that weeps blood from water dyed red by cochineal,
                                which runs over the frets that evoke the legendary city from which its name comes.
                            @elseif(session('locale')=='pt')
                                Localizado acima da porta da rua Macedonio Alcalá próximo ao antigo convento de Santo Domingo
                                O Patio del Guaje É um lindo espaço projetado pelo mestre Francisco Toledo. Decorado com telhas de barro vermelho
                                com dois importantes elementos em suas extremidades: a árvore Guaje, uma majestosa leguminosa que dá nome à cidade de Oaxaca e
                                a maravilhosa escultura "O Sangue de Mitla" também obra do Maestro Toledo.<br>
                                "La Sangre de Mitla" é uma fonte feita com sabino coberto de mica vulcânica que chora sangue da água tingida de vermelho pela grana conchonilha,
                                que corre sobre os arabescos que evocam a lendária cidade de onde vem o seu nome.
                            @else
                                Ubicado sobre la puerta de calle de Macedonio Alcalá a un costado del ex convento de Santo Domingo 
                                el Patio del Guaje es un hermoso espacio diseñado por el maestro Francisco Toledo. Adornado con baldosas de barro rojo 
                                con dos elementos importantes en sus extremos: el árbol del Guaje, majestuosa leguminosa que da su nombre a la ciudad de Oaxaca y
                                la maravillosa escultura "La Sangre de Mitla" obra también del Maestro Toledo.<br>
                                "La Sangre de Mitla", es una fuente elaborada con árbol de sabino cubierto de mica volcánica que llora sangre de agua teñida de rojo por grana conchinilla,
                                que corre sobre las grecas que evocan a la legendaria ciudad de la que proviene su nombre.
                            @endif
                        </p>
                    </div>

                    <div class="image">
                        <a href="imagenes/slider-4/img-01.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-01.jpg"
                                alt="Fuente la Sangre de Mitla en el Patio huaje">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Patio huaje | Foto: Ernesto de los Santos Reyes
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        {{--
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Invernadero de cristal
                            @endif
                        </h3>
                        <p>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Conocido también como Pabellón Educativo de Orquídeas, es una estructura de 120 metros
                                cuadrados diseñada por el estudio FGP Atelier, encabezado por el arquitecto mexicano
                                Francisco Gonzáles Pulido. Este cuenta con dos cámaras al interior que regulan su
                                temperatura (templada y tropical) a través de un sistema geotermal, permitiendo así la
                                conservación de un amplio número de especies. La construcción es un ejemplo sobresaliente de
                                tecnología sustentable, ya que emplea tanto celdas solares, como válvulas de riego y
                                nebulizadores que funcionan gracias a una gran cisterna de agua pluvial.
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-02.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-02.jpg" alt="Invernadero de cristal">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Invernadero de cristal | Foto: Ernesto de los Santos Reyes
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        --}}

            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Espejo de Cuanana ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                                Sculpture by Luis Zárate: <br>Cuanana Mirrora
                            @elseif(session('locale')=='pt')
                                Sculpture by Luis Zárate: <br>Cuanana Mirrora
                            @else
                                Escultura de Luis Zárate: <br> Espejo de Cuanana
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                                The Cuanana Mirror is a sculptural birdbath made by the Oaxacan sculptor Luis Zárate.
                                This work is located at the northern end of the garden and can be seen from the window to the garden located on C. de Berriozábal Street.
                            @elseif(session('locale')=='pt')
                                O Espelho Cuanana é um bebedouro escultural feito pelo escultor oaxaca Luis Zárate.
                                Esta obra situa-se no extremo norte do jardim e pode ser vista da janela do jardim situado na rua C. de Berriozábal.
                            @else
                                El Espejo de Cuanana, es un bebedero escultórico para aves realizada por el escultor oaxaqueño Luis Zárate.
                                Esta obra se encuentra en el extremo norte del jardín y puede ser contemplada desde la ventana al jardín que se ubica en la calle de C. de Berriozábal.
                                
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-03.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                    Espejo de Cuanana | Photo: Ernesto de los Santos Reyes
                                @elseif(session('locale')=='pt')
                                    Espejo de Cuanana
                                    | Foto: Ernesto de los Santos Reyes
                                @else
                                    Espejo de Cuanana
                                    | Foto: Ernesto de los Santos Reyes
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Escultura de Jorge Dubón ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                                Sculpture de Jorge Dubón
                            @elseif(session('locale')=='pt')
                                Sculpture by Jorge Dubón
                            @else
                                Escultura de Jorge Dubón
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum tempora perspiciatis maiores qui asperiores, sapiente, similique nihil, accusantium ipsam fuga consectetur laudantium voluptas beatae ullam saepe ipsum sit obcaecati! Inventore?
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Escultura de Jorge Dubón | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

             <!---------------------------------------------------------------------------------------->
            <!------------------------------- Cruz de maíz ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Cruz del Maíz
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                                Located in its geographic center and considered one of the most important spaces in the Garden,
                                the Corn Cross raises and guards what has been considered the unifying center
                                of Mesoamerican culture and identity: corn and its direct ancestors Teocintle and Tripsacum.<br>
                                With its covered paths and beautiful Mixtec fretwork, the ancestors of corn are surrounded by their
                                eternal companions: squash, chili, beans, amaranth as well as many other species,
                                which can be appreciated in this space in the garden.
                            @elseif(session('locale')=='pt')
                                Situado no seu centro geográfico e considerado um dos espaços mais importantes do Jardim,
                                A Cruz do Milho ergue e protege o que tem sido considerado o centro unificador
                                da cultura e identidade mesoamericana: o milho e seus ancestrais diretos Teosintle e Tripsacum.<br>
                                Com suas estradas cobertas e belos arabescos mixtecas, os ancestrais do milho cercam-se de seus
                                companheiros eternos: abóbora, pimenta, feijão, amaranto e muitas outras espécies,
                                que pode ser apreciado neste espaço ajardinado.
                            @else
                                Ubicado en su centro geográfico y considerado como uno de los espacios más importantes del Jardín,
                                la Cruz de Maíz enarbola y custodia lo que se ha considerado como el elemento unificador
                                de la cultura e identidad mesoamericana, el maíz y sus ancestros directos, el Teocintle y Tripsacum.<br>
                                Con sus caminos quebrados y hermosas greca Mixtecas, los ancestros del maíz, se rodean de sus 
                                eternos acompañantes: la calabaza, el chile, el frijol, el amaranto y los quelites, así como de muchas otras especies, 
                                que pueden ser apreciadas en este espacio del jardín.
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    La cruz del maíz | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Hornnos de cal ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Hornos de cal
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Durante el proceso de rescate arqueológico realizado durante la construcción del Jardín en 1994,
                                en su parte norte se hallaron dos hornos de cal o caleras que se estima debieron haber sido 
                                construidos previo al inicio de la construcción del convento en 1570.
                                Este espacio consta de dos boquetes de aproximadamente x metros de diámetro en los que 
                                se introducía la piedra caliza y se (a) calcinaba a altas temperaturas hasta formar cal viva,
                                la cual se apagaba añadiendo agua de las piletas que se encontraron a un lado obteniendo una
                                pasta que se utiliza para recubrir y encalar las superficies.
                                (a)y se alimentaba con leña de manera lateral, 
                                
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Hornos de cal | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Hornnos de cerámica ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Hornos de cerámica
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Este horno, junto con cientos de piezas de ..... fue hayado el el rescate arqueológico durante la construcción del Jardín Botánico en 1994.
                                A juicio de los arqueólogos, existe evidencia para considerar que este horno pudio haber sido utilizado para hacer tabiques de barro
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Hornos de cerámica | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>


            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Lavaderos ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Lavaderos
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                            En el fin del dormitorio hay un paso por una escalera a un patio
                            grande, y muy espacioso donde está un estanque de agua muy
                            anchuroso, y enfrente una cuadra, donde hay lavatorios grandes de
                            una vara de altos como mesas y pilas para rebalsar el agua, y lavar
                            los hábitos… (Burgoa...)
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Lavaderos | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------------------------------------------->
            <!------------------------------- Estanque ------------------------------->
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <h2 class="subtitulo">
                            @if(session('locale')=='en')
                                Outstanding <br>attractions
                            @elseif(session('locale')=='pt')
                                Atrações turísticas
                            @else
                                Atractivos <br> sobresalientes
                            @endif
                        </h2>
                        <h3>
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Estanque
                            @endif
                        </h3>
                        <p> 
                            @if(session('locale')=='en')
                            @elseif(session('locale')=='pt')
                            @else
                                Este es un espacio icónico del Jardín. Ubicado en el centro del mismo, cuenta con una fuente
                                que ...
                            @endif
                        </p>
                    </div>
                    <div class="image">
                        <a href="imagenes/slider-4/img-03.jpg" data-fancybox="gallery4">
                            <img src="imagenes/slider-4/img-pre-04.jpg"
                                alt="Escultura Espejo de Cuanana de Luis Zárate">
                            <h4 class="w-100">
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Hornos de cerámica | Foto: 
                                @endif
                            </h4>
                        </a>
                    </div>
                </div>
            </div>

            <div id="prev" onclick="prev()" class="button-prev"> </div>
            <div id="next" onclick="next()" class="button-next"> </div>

        </div>

    </section>





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
</div>
