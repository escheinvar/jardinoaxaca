<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    <title>@yield('title')</title>

    <!-- ------------------------------------ Boostrap ------------------------------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    


    <!-- ------------------------------------ Mi CSS y Mi js------------------------------------ -->
    <link href="{{asset('MyCss.css')}}" rel="stylesheet" />
    <script src="{{asset('MyJs.js')}}"></script> 

    <!--- ----------------------- JQuery ----------------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- ---------------------------------- SELECT2 ------------------------------ -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

    <!-- ----------------------------------- FONT AWESOME jardinetnobiologicodeoaxaca ------------------>
    <script src="https://kit.fontawesome.com/0001232f51.js" crossorigin="anonymous"></script>
    @livewireStyles

</head>
<body>
    <!--?php
    date_default_timezone_set('America/Mexico_City');
    ?-->
    @livewireScripts
    <div class="container">
        <!-- -------------------------------MAIN-HEADER ------------------------------ -->
        <header id="main-header">
            <div id="logo-header">
                <div  style="display: inline-block;">
                    <a href="/" class="nolink">
                        <img id="logoimg" src="{{asset('LogoCortoN.png')}}">
                    </a>
                </div>
                <div id="logotext" style="display: inline-block;">
                    <a href="/" class="nolink">Jardín Etnobiológico de Oaxaca</a>
                </div>
            </div>

            <!-- ------------------------------MAIN-HEADER: MENÚ --------------------------- -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuCompleto" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="MenuCompleto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/" aria-expanded="false">
                                    Web
                                </a>
                            </li>

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sitio Web
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Historia">Historia</a></li>
                                    <li><a class="dropdown-item" href="#">Estructura Institucional</a></li>
                                    <li><a class="dropdown-item" href="#">Directorio</a></li>
                                    <li><a class="dropdown-item" href="#">Colaboraciones</a></li>
                                    <li><a class="dropdown-item" href="#">Visitas guiadas</a></li>
                                    <li><a class="dropdown-item" href="#">Atractivos sobresalientes</a></li>
                                    <li><a class="dropdown-item" href="/mapa">Mapa del jardín</a></li>
                                    <li><a class="dropdown-item" href="#">Colecciones</a></li>
                                </ul>
                            </li> --}}
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actividades
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Conferencias</a></li>
                                    <li><a class="dropdown-item" href="#">Talleres</a></li>
                                    <li><a class="dropdown-item" href="#">Exposiciones</a></li>
                                    <li><a class="dropdown-item" href="#">Educativos</a></li>
                                    <li><a class="dropdown-item" href="#">Eventos sociales</a></li>
                                    <li><a class="dropdown-item" href="#">Comunitarios</a></li>
                                </ul>
                            </li>                            

                            @if(auth()->user())
                                <!-- -------------------------MENÚ CON ACCESO ------------------------------->
                                <!--li class="nav-item">
                                    <a class="nav-link" href="/home" aria-expanded="false">
                                        Home
                                    </a>
                                </li-->

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('iconos/Hojitas.png')}}" style="width:30px; height:30px;border:1px solid black;border-radius:100%; padding:2px;">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/home">Mi home</a></li>
                                        <li><a class="dropdown-item" href="#">Mis datos</a></li>
                                        <!-- ------------ SECCIÓN DE ADMIN --------------->
                                        @if(in_array('1', session('rol')))
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Usuarios</a></li>
                                        @endif
                                    </ul>
                                </li>          
                            @endif

                            <li class="nav-item">
                                @if(auth()->user())
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="nolink btn">
                                            Salir
                                            <img src="{{asset('iconos/HojasViento.png')}}"style="width:35px; height:35px;">
                                        </button>
                                    </form>
                                @else
                                    <a class="nav-link" href="/ingreso">Ingresar</a>
                                @endif
                            </li>

                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    

        <!-- ------------------------------- MAIN-CINTILLO ------------------------------ -->
        <section id="main-cintillo">
            <div>
                @yield('cintillo')
            </div>
            
        </section>


       <!-- ------------------------------- MAIN ------------------------------ -->
        <section id="main">
            <div>
                @yield('main')
                @if(isset($slot))
                    <!-- --------------------------------------- CARGA DE LIVEWIRE -------------------------->
                    {{ $slot }}
                @endif
            </div>
        </section>


        <!-- ------------------------------- MAIN-FOOTER ------------------------------ -->
        <footer>
            @yield('main-footer')
            
            <div style="width:100%;">
                <div class="center" style="width:100%;text-align:center;font-weight:bold;">
                    Visitas guiadas
                </div>

                <div class="footer-box">
                     Recorridos <b>Español</b> <br>
                     Lunes a viernes<br>
                     10:00 | 11:00 | 12:00 | 17:00 HRS<br>
                     Sábados<br>
                     10:00 | 11:00 | 12:00 HRS<br>
                     Máximo 40 personas por recorrido.
                </div>

                <div class="footer-box">
                     Recorridos <b>Inglés</b>, <b>Francés</b> y <b>Alemán</b><br>
                    Se reaperturarán hasta nuevo aviso<br>
                 </div>
             

                <div class="footer-box">
                    <b>Teléfono</b> 951 516 5325  <a href="#" class="nolink">Ver directorio telefónico</a><br>
                    etnobotanico@infinitummail.com<br>
                    Visitas escolares: escuelas@jardinoaxaca.mx<br>
                    Fotografia y video: fotovideo@jardinoaxaca.mx<br> 
                </div>

                <div class="center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953.5289111125766!2d-96.72282407063902!3d17.066995100000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c722394784bab5%3A0x2dd18b7042b6eabe!2sJard%C3%ADn%20Etnobot%C3%A1nico%20de%20Oaxaca!5e0!3m2!1ses-419!2smx!4v1636138442518!5m2!1ses-419!2smx"  style="border:0; width:100%;" allowfullscreen="" loading="lazy"></iframe><br>
                    Reforma sur s/n, Centro, Oaxaca de Juárez, Oaxaca. CP 6800.
                </div>
            </div>
            

            
        </footer>
    </div>
    

    
    <!-- ------------------------------------ Boostrap ------------------------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @script
</body>

</html>