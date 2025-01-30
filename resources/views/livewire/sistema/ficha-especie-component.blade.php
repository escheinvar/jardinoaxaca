<div>
    <div class="container">

        <!-- -------------------------------------- FRANJA CLASIFICACIÓN ----------------------------------------------->
        <div style="background-color:#CDC6B9; border-radius:8px; margin:5px; padding:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;">
            <div style="display:inline-block;">
                    <b>Plantae &nbsp; | &nbsp;  Familia Fabaceae &nbsp; | &nbsp;  <i>Leucanena esculenta</i></b> &nbsp; &nbsp; Huaje &nbsp;
            </div>
            <div style="display:inline-block;">
                {{-- <span class="d-none d-xl-inline-block">xl ExtraGrande</span>
                <span class="d-none d-lg-inline-block d-xl-none">lg Grande</span>
                <span class="d-none d-md-inline-block d-lg-none">md Mediano</span>
                <span class="d-none d-sm-inline-block d-md-none ">sm Chico</span>
                <span class="d-xs-block d-sm-none">sm Extrachico</span> --}}
            </div>
            <div style="width:450px;display:inline-block;">
            </div>

            <div style="display:inline-block;">
                Ver en @include('plantillas.plant_locale')
            </div>
            <div style="display:inline-block;">
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
                    <div class="pt-4 d-block d-md-none"          style="font-size:150%;">Leucaena esculenta</div>
                    <div class="pt-4 d-none d-md-block d-lg-none"style="font-size:120%;">Leucaena esculenta</div>
                    <div class="pt-4 d-none d-lg-block"          style="font-size:140%;">Leucaena esculenta</div>
                </div>

                <!-- ------------------------- Nombre Común ------------------------>
                <div style="color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center; font-weight:100;" >
                    <div class="py-4 d-block d-md-none"          style="font-size:120%;">Huaje</div>
                    <div class="py-4 d-none d-md-block d-lg-none"style="font-size:80%;"><b>Huaje</b></div>
                    <div class="py-4 d-none d-lg-block"          style="font-size:110%;"><b>Huaje</b></div>
                </div>

                <!-- ------------------------- Categoría de riesgo ------------------------>
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
                    <img src="https://sistemapilotojeboax.com/img/huaje.jpg"
                        class="py-2 py-sm-2 py-md-0 py-lg-0 img-fluid"
                        style="heigth:100%; max-width:80%;center">
                </center>
            </div>

            <!-- ------------------------- GALERÍA DE FOTOGRAFÍAS ------------------------>
            <div class="col-sm-12 col-md-2 col-lg-2 center">
                <!-- flecha -->
                <div class="center" style="text-align: center;">
                    <i class="bi bi-arrow-up-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
                </div>

                <!-- img -->
                <div class="center">
                    <img src="https://sistemapilotojeboax.com/img/huaje_m.jpg"
                        style="cursor: pointer;"
                        class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1"
                        >
                </div>
                <!-- img -->
                <div class="center">
                    <img src="https://sistemapilotojeboax.com/img/Codice_huaje.jpg"
                        style="cursor: pointer;"
                        class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1"
                        >
                </div>
                <!-- img -->
                <div class="center">
                    <img src="https://www.sabermas.umich.mx/images/stories/49/art_9_1.jpg"
                        style="cursor: pointer;"
                        class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1"
                        >
                </div>
                <!-- img -->
                <div class="center">
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQVAJkj3UnvMzAsafGgPVK0E_R96jVHxtu0RDxxsLdp7YGm4t7-nd1ety0RZo1iE8mRydPWKjreUOHWbKUEYKLKcQ"
                        style="cursor: pointer;"
                        class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1"
                        >
                </div>

                <!-- flecha -->
                <div class="center" style="text-align: center;">
                    <i class="bi bi-arrow-down-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
                </div>
            </div>
        </div>




        <!-- -------------------------------------- FRANJA INFO ----------------------------------------------->
        <!--div class="row" style="margin:5px; border-bottom-left-radius:8px; background-color:#87796d;"-->
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

                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#inicio">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Inicio
                            </a>
                        </div>

                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#usos">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Nombres
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#usos">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Hábitat
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#usos">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Etnobiología
                            </a>
                        </div>

                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#HistoriaNatural">Historia
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                natural
                            </a>
                        </div>


                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#usos">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Usos
                            </a>
                        </div>

                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#herbario">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Herbario
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#polinizacion">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Polinización
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Genética
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Jardín
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Distribución
                            </a>
                        </div>
                        <div class="px-0 pb-2" style="cursor: pointer;">
                            <a class="nolink" href="#">
                                <!-- i class="bi bi-volume-down-fill" onclick="Escucha('')"></i -->
                                Productos
                            </a>
                        </div>
                    </div>
                </nav>

            </div>

            <!-- -------------- Texto central ----------------->
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="background-color:#CDC6B9;">
                <div class="py-3 ps-3" style="">
                    <a name="nombres"></a>
                    <h5>Nombres  <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>

                    <li><b>n'i<sup>4</sup>n'i<sup>4</sup></b>: lengua <b>dibaku</b>, cuicateco de Santa María Pápalo <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>
                    <li><b>pemb</b>: lengua <b>ombeayiüts</b> de San Mateo del Mar; término genérico para Leucaena spp. <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>
                    <li><b>tnúndétè</b>: lengua <b>tnu’un dau</b>, mixteco de Tilantongo <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>
                    <li><b>yaglia</b>: lengua <b>dixdà</b>, zapoteco de Mitla <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>
                    <li><b>yka nda’ jwi’ya, kwilyo’o</b>:  lengua <b>cha’ jna’a</b>, chatino de Panixtlahuaca; término específico para “huaje del valle de Oaxaca”; etimología: ‘árbol huaje tuza?’, ‘su espos@’ <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>
                    <li><b>huāxin</b>: <b>náhuatl</b> de la Cuenca de México, siglo XVI <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></li>


                </div>
                <div class="py-3 ps-3">
                    <h5>Nombre común <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    Huaje  <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i>
                </div>

                <div class="py-3 ps-3">
                    <h5>Nombre científico <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    <i>Leucaena esculenta</i> (Moc. & Sessé ex DC.) Benth  <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i>
                </div>

                <div class="py-3 ps-3">
                    <h5>Distribución Geográfica <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    Centro y sur de México  <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i>
                </div>

                <div class="py-3 ps-3">
                    <h5>Hábitat <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    <p>Crece en bosques tropicales caducifolios y en su transición a bosques de encino; las poblaciones silvestres se ubican en la cuenca alta del Balsas en Oaxaca, Puebla y Guerrero  <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></p>
                </div>

                <div class="py-3 ps-3">
                    <h5>Historia natural <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    <p>Las semillas de este árbol son un alimento importante en Oaxaca. También se consumen las hojas tiernas, las flores e incluso la goma que produce el tronco en respuesta a algunos parásitos. En los mercados de esta ciudad encontrarás en venta manojos de vainas de huaje de octubre a marzo; las semillas se comen frescas como verdura y también secas, tostadas y molidas. Esta especie ha sido seleccionada desde la antigüedad como árbol de huerto, propagando las semillas con un contenido más bajo de mimosina. También llamado leucenol, éste es un aminoácido tóxico con una estructura química similar a la tirosina, que forma parte de nuestras proteínas. La mimosina es una defensa de la planta contra los animales herbívoros. <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></p>
                </div>

                <!-- -------------- tira de fotos ---------------------->
                <div class="py-0 ps-0 center" style="color: #CDC6B9; width:120%;">
                    <i class="bi bi-arrow-left-circle" style="font-size: 170%; cursor: pointer;"></i>
                    <img src="https://i.ytimg.com/vi/pj_9slUf3E0/maxresdefault.jpg"   style="max-height: 200px;padding:5px;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZzIYXa3Gecstc5iR1e054u4jFPaKnjcLS1Q&s" style="max-height: 200px;padding:5px;">
                    <i class="bi bi-arrow-right-circle" style="font-size: 170%; cursor: pointer;"></i>
                </div>

                <div class="py-3 ps-3">
                    <h5>Etnobiología <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></h5>
                    <p>En diversas lenguas originarias, el nombre de Oaxaca se refiere siempre al huaje. Nuestra ciudad se nombra Lua y Lulá’ en las lenguas zapotecas, Nunduva en mixteco y Huāxacac en náhuatl, relacionándose en todos los casos con este árbol. El Códice Mendocino es un manuscrito elaborado en la década de 1540 en la Ciudad de México, que incluye una lista de poblaciones que pagaban tributo a la Triple Alianza. Entre ellas aparece Oaxaca, representada por el glifo de un cerro coronado por una cabeza humana con dos ramas de huaje en vaina. <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></p>
                    <p>Además de servir como alimento, hoy día se fabrican collares y otros adornos artesanales con las semillas secas del huaje, de color natural o teñidas. Por ser especies fijadoras de nitrógeno, por ser árboles resistentes a sequía y por ser fuentes de forraje para el ganado, diversos miembros del género Leucaena son plantados en campañas de reforestación para recuperar suelos empobrecidos en regiones tropicales secas de África y Asia. Seguramente también nos serán útiles en México para diseñar sistemas agroforestales a futuro, en suelos erosionados actualmente improductivos. <i class="bi bi-volume-down-fill" style="cursor:pointer;" onclick="Escucha('')"></i></p>
                </div>







            </div>

            <!-- -------------- Imágenes derecha ----------------->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="background-color:#CDC6B9;">
                <img src="https://sistemapilotojeboax.com/img/huajemapa.png"
                    style="width:100%;  padding:15px;">

                <img src="https://herbanwmex.net/imglib/seinet/mam/PH/PH00014/PH00014975_1666637167_web.jpg"
                    style="width:100%;  padding:15px;">

                <img src="/MapaTemp.png"
                    style="width:100%;  padding:15px;">
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
