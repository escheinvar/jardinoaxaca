<div>
@section('title') 
Parada
@endsection

@section('meta-description')
Visita por el Jardín
@endsection

@section('banner')
banner-historia
@endsection

@section('banner-title') 
Parada {{$parada}} 
@endsection

<style>
    #mapa { height: 400px; width:100%;}
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    
<!-- Leaflet. Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>






    <!--S2 RECORRIDOS-->
    <section class="recorridos" id="horarios">
        <div class="container pb-5">
            <div class="row justify-content-between py-5 px-4">
                <div class="col-md-12 col-xl-6 info-horarios">
                    <h2 class="subtitulo">El Templo de Santo Domingo</h2>
                    <p class="texto-principal">Estamos por iniciar nuestro recorrido. Nos encontramos a espaldas del conjunto concentual de los Dominicos.   </p>
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
                                    <div id="mapa" wire:ignore></div>
                                    {{-- <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15256.577332703622!2d-96.7219608!3d17.0655913!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c722394784bab5%3A0x2dd18b7042b6eabe!2sJard%C3%ADn%20Etnobot%C3%A1nico%20de%20Oaxaca!5e0!3m2!1ses-419!2smx!4v1690404367563!5m2!1ses-419!2smx"
                                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="visitas pt-4">
    <div class="container px-4 py-5" id="bienvenido">
        <div class="row justify-content-around text-center pb-4">
            <div class="col-sm-12 col-md-9 col-lg-8 col-xl-7 pt-5 px-4">
                <h2 class="subtitulo">1) El Templo de Santo Domingo</h2>
            </div>
            <p class="texto-principal">Estamos por iniciar nuestro recorrido. Nos encontramos a espaldas del conjunto concentual de los Dominicos.          
            Los dominicos edificaron este grandioso convento porque era muy importante en Oaxaca para ellos. Esta fue su sede, no solamente al sur de México, sino de Centroamérica.
            Éste era el lugar más importante para entrenar novicios dominicos. Los novicios eran los jóvenes que querían convertirse en frailes y estudiaban teología.  
            Pero no solamente estudiaban religión, estudiaban las costumbres y las lenguas de la gente donde ellos iban a hacer su labor. Esto se convirtió en un centro de conocimiento. 
            ¿Por qué lo menciono? Oaxaca tiene la mayor riqueza de lenguas en América para un área del tamaño de Oaxaca. Estamos en un área de gran diversidad cultural y eso lo vemos reflejado en la historia de Santo Domingo.
            Los dominicos, al darle tal importancia a este edificio, construyen un conjunto enorme, la edificación más grande en su tiempo en todo Oaxaca, los muros más altos.
            Para darles una idea, ahí donde está ahorita instalada la cocina, porque al rato va a haber una boda y después de eso vamos a platicar de eso más adelante, ahí más o menos donde está el cocinero que nos está dando la espalda, hicieron los arqueólogos una cala cuando este conjunto se restauró para convertirlo en museo, porque no sabían a qué profundidad estaban los cimientos y por lo tanto no sabían qué tan sólido era el edificio en caso de sismos, aquí tiembla mucho. ¿Cuánto creen ustedes que encontraron la profundidad? ¿Alguien tiene nociones de construcción? ¿Alguien de ustedes se dedica a la arquitectura o a la ingeniería? ¿Más o menos cuánto le calcularían ustedes de cimientos para este edificio? ¿El doble de la altura? El doble de la altura. Pues no, fíjese que no, pero de todos modos es impresionante la profundidad.
            Encontraron los arqueólogos que los cimientos están hasta 7 metros y medio de profundidad. Imagínense excavar a mano 7 metros y medio para erigir muros más altos. Y se fueron a esa profundidad porque anclaron el edificio en la roca madre.
            Encontraron los arqueólogos que los cimientos están amarrados con la piedra. Si la piedra hubiera estado más profunda, se hubieran ido más hondo. Les ayudó que no está tan profunda la piedra, amarraron el edificio.
            9:35 Les menciono todo esto porque eso determinó la historia de Santo Domingo y nos marca hasta hoy lo que les queremos presentar. ¿A qué me refiero? Siendo la construcción más sólida, más alta en Oaxaca, los militares querían Santo Domingo porque al dominar Santo Domingo tú podías aventar cañonazos y destruir a cualquier intento de dominar a la ciudad. Y lo hicieron.
            A lo largo del siglo XIX, los años 1800, desde la Guerra de Independencia, todos los ejércitos de un bando y del otro querían dominar Santo Domingo. Y con las leyes de reforma, con Benito Juárez, oaxaqueño como presidente, con la separación afortunada (sentimos nosotros) de religión y política, de iglesia y de Estado, al separarse esto se convierte en bienes nacionales. Juárez nacionaliza lo que había sido la institución más poderosa económicamente y el terrateniente número uno en México.
            Todos esos bienes pasan a ser bienes nacionales, incluyendo Santo Domingo. Los dominicos se van. Y los militares dicen, pues de aquí soy.
            ¿Por qué? Porque quien dominaba Santo Domingo dominaba la ciudad. Y esto se convierte en un gran cuartel desde las leyes de reforma. Aquí vivían soldados, no unos cuantos, vivía todo un regimiento.
            Este edificio atrás de ustedes eran las oficinas. Este no es, como ustedes pueden ver, de la época de los dominicos. Este se construyó apenas 1903, 1904 como oficinas de los militares.
            Y todo esto que ven ustedes abierto ahora, que ven ustedes jardín, eran barracas, era un campo de tiro, había aquí entrenamiento de conscriptos, había canchas deportivas, era un gran cuartel militar. 
            Y fue hasta 1994 que logramos sacar a los militares. Digo logramos porque fui parte de ese esfuerzo.
            Nos movilizamos en la sociedad civil de Oaxaca con el liderazgo de nuestro querido maestro Francisco Toledo y logramos que los militares se reubicaran. Y una vez salidos los militares, logramos que el gobierno del Estado no se saliera con la suya. Porque aunque ustedes no lo crean, el gobierno del Estado quería hacer aquí un gran estacionamiento.
            Yo tuve que confrontar al secretario de turismo de aquel entonces, que estaba rojo de coraje, que le cuestionáramos su proyecto. Él decía, es que falta estacionamiento en Oaxaca. Le dijimos, ¿pero qué te pasa compañero? ¿Qué te pasa? Ese es un espacio de vocación pública, no se puede privatizar.
            Y debe de tener una misión cultural. Y todo el complejo afortunadamente hoy día tiene esa vocación. Todo está abierto al público, ahorita no por la pandemia, pero antes de la pandemia todo estaba abierto, todo lo podían ustedes visitar y todo una función cultural, con tres componentes.
            Arriba en la planta alta, el Museo de las Culturas de Oaxaca. Ahí se muestra la experiencia humana, desde los primeros cazadores-recolectores hace 10.000 años hasta los migrantes transnacionales que tienen que emigrar de Oaxaca por pobresa. Es uno de los estados con más expulsión de población.
            Esa trayectoria humana de 10.000 años está representada allá arriba. 
            En la planta baja, la Biblioteca Burgoa, una biblioteca histórica sensacional que guarda los tesoros bibliográficos de los dominicos. Y el jardín, mi responsabilidad, yo propuse este jardín como un jardín etnobotánico.
            </p>
        </div>
    </div>
</section>



 <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <!-- -------------------------------------------- JAVA SCRIPT ---------------------------------------------->
    <script>
        ///// Carga el mapa
        const mapa = VerMapaJardin('mapa');

    </script>
</div>

