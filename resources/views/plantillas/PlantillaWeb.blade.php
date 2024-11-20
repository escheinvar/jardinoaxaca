<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Diseño Alma Lizeth Pérez Bautista, 2023 -->
    <!-- Programación Enrique Scheinvar, 2024 -->

    <!--META DESCRIPCIÓN-->
    <meta name="description" content=@yield('meta-description')>
    <!--FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@600;700&family=Roboto&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <!--CSS BOOTSTRAP-->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}

    <!-- ------------------------------------ Boostrap Enri------------------------------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    

    <!--CSS OWL CAROUSEL-->
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.css">

    <!--css FANCYBOX-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

     <!-- ----------------------------------- FONT AWESOME jardinetnobiologicodeoaxaca ------------------>
     <script src="https://kit.fontawesome.com/0001232f51.js" crossorigin="anonymous"></script>

     <!-- ----------------------------------- LEAFLET -------------------------------------------->
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

      <!-- ---------------------------------- SELECT2 ------------------------------ -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

    <!--- ----------------------- JQuery ----------------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    <!--HOJA DE ESTILOS-->
    <link rel="stylesheet" href="/style.css">

    <!-- ------------------------------------ Mi CSS y Mi js------------------------------------ -->
    {{-- <link href="{{asset('MyCss.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/style2.css">
    <script src="{{asset('MyJs.js')}}"></script> 
</head>

<body>
    @livewireScripts

    <header>
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-lg texto-nav fondo-nav" aria-label="Offcanvas navbar large">
            <div class="container-fluid px-4 py-1" id="header">

                <!--Logo-->
                <a class="navbar-brand p-0 ms-3" href="/">
                    <img src="/imagenes/logo-nav.png" alt="logo del Jardín Etnobotánico">
                </a>

                <!--botón hamburguesa-->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Menú superior   -->
                <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="offcanvasNavbar2"
                    aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <a class="offcanvas-logo" href="index.html" id="offcanvasNavbar2Label">
                            <img src="/imagenes/logo-nav.png" alt="logo del Jardín Etnobotánico">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link @if(request()->path() == '/') active @endif" href="/">inicio</a>
                            </li>
                            <!--dropdown 1-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle @if(in_array(request()->path(),['recorridos','mapa'])) active @endif" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Visita el Jardín
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @if(request()->path() == 'recorridos') active @endif" href="/recorridos">Recorridos</a></li>
                                    <li><a class="dropdown-item @if(request()->path() == 'mapa') active @endif" href="/mapa">Mapa</a></li>
                                </ul>
                            </li>
                            <!--dropdown 2-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle @if(in_array(request()->path(),['historia','servicios','directorio','colaboradores'])) active @endif" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Conócenos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @if(request()->path() == 'historia') active @endif" href="/historia">Historia</a></li>
                                    <li><a class="dropdown-item @if(request()->path() == 'servicios') active @endif" href="/servicios">Servicios</a></li>
                                    <li><a class="dropdown-item @if(request()->path() == 'directorio') active @endif" href="/directorio">Directorio</a></li>
                                    <li><a class="dropdown-item @if(request()->path() == 'colaboradores') active @endif" href="/colaboradores">Colaboradores</a></li>
                                </ul>
                            </li>
                            <!---->
                            <li class="nav-item">
                                <a class="nav-link @if(request()->path() == 'educacion') active @endif" href="/educacion">
                                    Educación
                                </a>
                            </li>
                            <!---->
                            <li class="nav-item">
                                <a class="nav-link @if(request()->path() == 'actividades') active @endif" href="/actividades">
                                    Eventos
                                </a>
                            </li>


                            @if(auth()->user())
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->path() == 'home') active @endif" href="/home">
                                        Home
                                    </a>
                                </li>
                                
                                <!---->
                                <li class="nav-item">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="nolink btn" style="padding:0;margin:0;">
                                            Salir
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                        <a class="nav-link @if(request()->path() == 'ingreso') active @endif" href="/ingreso">Ingresar</a>
                                </li>
                            @endif
                            </li>



                        </ul>
                        <div class="col iconos-nav">
                            <a href="https://www.facebook.com/jardinoaxaca" target="_blank">
                                <img src="/imagenes/icono-facebook.png" alt="icono facebook">
                            </a>
                            <a href="https://www.instagram.com/jardinetnobotanicodeoaxaca/" target="_blank">
                                <img src="/imagenes/icono-instagram.png" alt="icono instagram ">
                            </a>
                            <a href="https://goo.gl/maps/vdvcHAUMTHQaDZ676" target="_blank">
                                <img src="/imagenes/icono-mapa.png" alt="icono mapa">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!--BANNER INDEX-->
        <section class="@yield('banner') pb-5">
            <div class="container-fluid p-0">
                <div class="row inicio">
                    <div class="col-12 text-end p-0">
                        <h1>@yield('banner-title')</h1>
                    </div>
                </div>
                <div class="row redes-header text-start">
                    <div class="col iconos">
                        <a href="https://www.facebook.com/jardinoaxaca" target="_blank">
                            <img src="/imagenes/icono-facebook.png" alt="icono facebook">
                        </a>
                        <a href="https://www.instagram.com/jardinetnobotanicodeoaxaca/" target="_blank">
                            <img src="/imagenes/icono-instagram.png" alt="icono instagram ">
                        </a>
                        <a href="https://goo.gl/maps/vdvcHAUMTHQaDZ676" target="_blank">
                            <img src="/imagenes/icono-mapa.png" alt="icono mapa">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#bienvenido">
                            <div class="button-scroll-down">
                                <p>SCROLL</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </header>

    @if(isset($slot))
        <!-- ---------------------- CARGA DE LIVEWIRE ------------------------------->
        {{ $slot }}
    @endif



    
    <!-- ---------------------- MAIN SUP ------------------------------->
    @yield('main-superior')




    <!-- ---------------------- MAIN INF ------------------------------->
    @yield('main-inferior')





    <!-- ------------------------ FOOTTER------------------------------->
    <footer>
        <div class="container-fluid ">
            <div class="row justify-content-around p-5">

                <!--Primera columna-->

                <div class="col-sm-12 col-xl-12 col-xxl-3 mb-4 botones">
                    <div class="row pb-3">
                        <div class="col">
                            <a href="/">
                                <img src="/imagenes/logo-footer.png" class="logo" alt="Logo del Jardín">
                            </a>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <a href="/recorridos" class="recorridos-2">Recorridos</a>
                        </div>
                    </div>

                    <div class="row pt-2 justify-content-center redes_footer">
                        <div class="col iconos">
                            <a href="https://www.facebook.com/jardinoaxaca" target="_blank">
                                <img src="/imagenes/icono-facebook.png" alt="icono facebook">
                            </a>
                            <a href="https://www.instagram.com/jardinetnobotanicodeoaxaca/" target="_blank">
                                <img src="/imagenes/icono-instagram.png" alt="icono instagram ">
                            </a>
                            <a href="https://goo.gl/maps/vdvcHAUMTHQaDZ676" target="_blank">
                                <img src="/imagenes/icono-mapa.png" alt="icono mapa">
                            </a>
                            <a href="mailto:etnobotanico@infinitummail.com" target="_blank">
                                <img src="/imagenes/icono-correo.png" alt="icono correo">
                            </a>
                        </div>
                    </div>
                </div>

                <!--Segunda columna-->

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mt-4">
                    <div class="row">
                        <div class="col">
                            <div class="col pb-2">
                                <h5>Dirección</h5>
                                <p>Reforma Sur s/n, esquina Constitución,<br> Col. Centro, 68000 Oaxaca de
                                    Juárez,<br>México.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h5>Contacto</h5>
                            <p>Oficina 516 5325 <br> Biblioteca y Colecciones 516 9017</p>
                        </div>
                    </div>
                </div>

                <!--Tercera columna-->

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mt-4">
                    <h5>Extensiones</h5>
                    <p>Información de los recorridos guiados 4 <br>Información de bodas y eventos sociales 6<br>
                        Vistas escolares 5 <br>Administración 101 <br>Dirección 102 <br>Biblioteca 110
                        <br>Mantenimiento 114 <br>Colecciones 116.
                    </p>
                </div>

                <!--Cuarta columna-->

                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 col-xxl-2 mt-4">
                    <div class="row">
                        <div class="col">
                            <h5>Horario de atención</h5>
                            <p>Jardín Etnobotánico<br>Lunes - Viernes: 10:00 a 17:00 horas<br>Sábados: 10:00 a 12:00
                                horas</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>Biblioteca<br>Lunes-Viernes: 9:00 a 17:00 horas<br>Sábados: 9:00 a 13:00 horas</p>
                        </div>
                    </div>
                </div>

                <!--Quinta columna-->

                <div class="col-sm-12 col-lg-12 col-xl-1 col-xxl-1 mt-4 mb-4 pt-5">
                    <a href="#header">
                        <div class="button-scroll-up">
                            <p>SUBIR</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </footer>






    <!-- ---------------------- SCRIPTS ------------------------------->
    <!--SCRIPS-->
    <!--BOOTSTRAP 5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <!--CDN JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--owl carousel-->
    <script src="owlcarousel/owl.carousel.js"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                dotsEach: 1,
                autoplay: true,
                autoplayTimeout: 8000,
                autoplaySpeed: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }

            });
        });
    </script>

    <!--fancybox-->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>


    @yield('scripts')
    
</body>

</html>