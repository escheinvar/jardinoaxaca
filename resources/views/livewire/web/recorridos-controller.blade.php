@section('title') 
Recorridos en el Jardín
@endsection

@section('meta-description')
¿Listo para visitarnos? Conoce los horarios de nuestros recorridos diarios y todo lo que tenemos para ofrecerte.
@endsection

@section('banner')
banner-recorridos
@endsection

@section('banner-title')
    @if(session('locale')=='en')
        Plan <br>your visit
    @elseif(session('locale')=='pt')
        Planeje <br>sua visita
    @else
        Planea<br>tu visita 
    @endif
@endsection

<div>

    <!--S1 VISITAS-->
    <section class="visitas pt-4">
        <div class="container px-4 py-5" id="bienvenido">
            <div>
                @include('plantillas/plant_locale')
            </div>

            <div class="row justify-content-around text-center pb-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-7 pt-5 px-4">
                    <h2 class="subtitulo">
                        @if(session('locale')=='en')
                            Guided tours
                        @elseif(session('locale')=='pt')
                            Visitas guiadas
                        @else
                            Visitas guiadas
                        @endif
                    </h2>
                    <p class="texto-principal">
                        @if(session('locale')=='en')
                            We appreciate your interest in the Garden and our work.
                            For the safety of visitors and plants, the Garden can only be visited on guided tours.
                            We do not have reservations or advance ticket sales.
                        @elseif(session('locale')=='pt')
                            Agradecemos o seu interesse pelo Jardim e pelo nosso trabalho.
                            Para segurança dos visitantes e das plantas, o Jardim só pode ser visitado em visitas guiadas.
                            Não temos reservas nem venda antecipada de ingressos.
                        @else
                            Agradecemos tu interés por el Jardín y por nuestro trabajo.
                            Por seguridad de los visitantes y de las plantas, el Jardín sólo puede ser visitado en recorridos guiados.
                            No contamos con reservaciones  ni venta de boletos con anticipación
                        @endif
                    </p>
                </div>
            </div>

            <div class="row justify-content-center text-center pt-4 pb-5">
                <div class="col-sm-12 col-md-auto pb-5">
                    <a href="#horarios" class="horarios">
                        @if(session('locale')=='en')
                            Schedules
                        @elseif(session('locale')=='pt')
                            Horários
                        @else
                            Horarios
                        @endif
                    </a>
                </div>
                <div class="col-sm-12 col-md-auto">
                    <a href="#escolares" class="escolares">
                        @if(session('locale')=='en')
                            School visits
                        @elseif(session('locale')=='pt')
                            Visitas escolares
                        @else
                            Visitas escolares
                        @endif
                    </a>
                </div>
            </div>

            <div class="row justify-content-center galeria-recorridos py-4">
                <div class="col-sm-12 col-lg-9 ">
                    <div class=" owl-carousel owl-theme">
                        <div>
                            <a href="imagenes/slider-2/img-01.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-01.jpg" alt="Fachada del jardin">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Entrance to the Ethnobotanical Garden of Oaxaca |
                                        Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Entrada no Jardim Etnobotânico de Oaxaca |
                                        Foto: Ernesto de los Santos Reyes
                                    @else
                                        Entrada del Jardín Etnobotánico de Oaxaca | 
                                        Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-02.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-02.jpg" alt="Inicio de recorrido">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Tours National Botanical Gardens Day |
                                        Photo: Alma Pérez Bautista  
                                    @elseif(session('locale')=='pt')
                                        Passeios de um dia no Jardim Botânico Nacional |
                                        Foto de : Alma Pérez Bautista
                                    @else
                                        Recorridos Día Nacional de los Jardínes Botánicos | 
                                        Foto: Alma Pérez Bautista
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-03.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-03.jpg" alt="Vegetación del jardin">
                                <h3 class="w-100"> 
                                    @if(session('locale')=='en')
                                        Exploring the Garden, guided tour |
                                        Photo: Ernesto de los Santos Reyes
                                    @elseif(session('locale')=='pt')
                                        Exploração do Jardim, visita guiada |
                                        Foto: Ernesto de los Santos Reyes
                                    @else
                                        Explorando el Jardín, recorrido guiado | 
                                        Foto: Ernesto de los Santos Reyes
                                    @endif
                                </h3>
                            </a>
                        </div>
                        <div>
                            <a href="imagenes/slider-2/img-04.jpg" data-fancybox="gallery1">
                                <img src="imagenes/slider-2/img-pre-04.jpg" alt="Visitantes cerca del espejo de agua">
                                <h3 class="w-100">
                                    @if(session('locale')=='en')
                                        Tour on National Day of Botanical Gardens |
                                        Photo: Alma Pérez Bautista
                                    @elseif(session('locale')=='pt')
                                        Tour no Dia do Jardim Botânico Nacional |
                                        Foto de : Alma Pérez Bautista
                                    @else
                                        Recorrido en el Día Nacional de los Jardínes Botnánicos | 
                                        Foto: Alma Pérez Bautista
                                    @endif
                                </h3>
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
                                    <h2 class="subtitulo">
                                        @if(session('locale')=='en')
                                            Horários
                                        @elseif(session('locale')=='pt')
                                            Horários
                                        @else
                                            Horarios
                                        @endif
                                    </h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 pt-4">
                                    @if(session('locale')=='en')
                                        <h3>Guided tours in Spanish</h3>
                                        <h4>Duration: 1 hour</h4>
                                        <p>Monday - Friday<br>10:00, 11:00, 12:00 and 17:00 hours</p>
                                        <p>Saturdays<br>10:00, 11:00 and 12:00 hours</p>
                                        <p>At the moment we only offer tours in Spanish</p>
                                    @elseif(session('locale')=='pt')
                                        <h3>Visitas guiadas em espanhol</h3>
                                        <h4>Duração: 1 hora</h4>
                                        <p>Segunda a sexta<br>10h, 11h, 12h e 17h</p>
                                        <p>Sábados<br>10h, 11h e 12h</p>
                                        <p>No momento oferecemos passeios apenas em espanhol</p>
                                    @else
                                        <h3>Recorridos guiados</h3>
                                        <h4>Duración: 1 hora</h4>
                                        <p>Lunes - viernes<br>10:00, 11:00, 12:00 y 17:00 horas</p>
                                        <p>Sábados<br>10:00, 11:00 y 12:00 horas</p>
                                        <p>Por el momento, los recorridos solo son en español</p>
                                        
                                    @endif
                                    {{-- <h3>Recorridos en inglés</h3>
                                    <h4>Duración: 2 horas</h4>
                                    <p>Sábados<br>10:00, 11:00 y 12:00 horas</p> --}}
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 py-4">
                                    {{-- <h3>Recorridos en frances</h3>
                                    <h4>Se reapertura hasta nuevo aviso</h4>
                                    <h3>Recorridos en alemán</h3>
                                    <h4>Se reapertura hasta nuevo aviso</h4> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row entradas pt-3">
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-xl-12">
                                    <h2 class="subtitulo">
                                        @if(session('locale')=='en')
                                            Tickets
                                        @elseif(session('locale')=='pt')
                                            Ingressos
                                        @else
                                            Entradas
                                        @endif
                                    </h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6  pt-4">
                                    @if(session('locale')=='en')
                                        <h3>Guided tours (in Spanish)</h3>
                                        <p>Adults - $50.00 pesos</p>
                                        <p>Children from 0 to 12 years old - Free</p>
                                        <p>Students, teachers, senior citizens - Free <br>(With Mexican ID)</p>
                                        <p>People with disabilities - Free <br>(With Mexican ID)</p>
                                    @elseif(session('locale')=='pt')
                                        <h3>Visitas guiadas (em espanhol)</h3>
                                        <p>Adultos - US$ 50,00 pesos</p>
                                        <p>Crianças de 0 a 12 anos, - Grátis</p>
                                        <p>Estudantes, professores, idosos - Gratuito <br>(com credencial mexicana)</p>
                                        <p>Pessoas com deficiência - Gratuito<br>(Com credencial mexicana)</p>
                                    @else
                                        <h3>Recorridos guiados</h3>
                                        <p>Adultos - $50.00 pesos</p>
                                        <p>Niños de 0 a 12 años, - Gratis</p>
                                        <p>Estudiantes, maestros personas de la tercera edad - Gratis <br>(Con credencial mexicana)</p>
                                        <p>Personas con alguna discapacidad - Gratis<br>(Con credencial mexicana)</p>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 py-4">
                                    {{-- <h3>Recorridos en inglés</h3>
                                    <p>Adultos - $50.00 pesos</p>
                                    <p>Niños de 0 a 12 años - Gratis</p> --}}
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
                                    <h2 class="subtitulo">
                                        @if(session('locale')=='en')
                                            Location
                                        @elseif(session('locale')=='pt')
                                            Localização
                                        @else
                                            Ubicación
                                        @endif
                                    </h2>
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
                            <h3>
                                @if(session('locale')=='en')
                                    Frequently Asked Questions
                                @elseif(session('locale')=='pt')
                                    Perguntas frequentes
                                @else
                                    Preguntas frecuentes
                                @endif
                            </h3>
                            <div class="accordion accordion-flush-recorridos" id="accordionFlushExample">
                                <!--ITEM 1-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            @if(session('locale')=='en')
                                                Where can I purchase my ticket?
                                            @elseif(session('locale')=='pt')
                                                Onde posso comprar meu ingresso?
                                            @else
                                                ¿Dónde puedo adquirir mi boleto?
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            @if(session('locale')=='en')
                                                You can get your ticket once you enter the Garden and before the start of each tour.
                                                At the moment we do not have external points of sale, reservations or advance ticket sales.
                                            @elseif(session('locale')=='pt')
                                                Você pode adquirir seu ingresso assim que entrar no Jardim e antes do início de cada passeio.
                                                De momento não temos pontos de venda externos, reservas ou venda antecipada de bilhetes.
                                            @else
                                                Puede conseguir su boleto una vez ingrese al Jardín y previo al inicio de cada recorrido. 
                                                Por el momento no contamos con puntos de venta externos, reservaciones o venta de boletos con anticipación.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--ITEM 2-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            @if(session('locale')=='en')
                                                Can I book a private tour?
                                            @elseif(session('locale')=='pt')
                                                Posso reservar um tour privado?
                                            @else
                                                ¿Puedo contratar un recorrido privado?
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            @if(session('locale')=='en')
                                                We do not offer self-guided access to the Garden, nor private tours.
                                                We realize that many people who would like to visit this garden cannot wait.
                                                We sincerely apologize for this and ask for your understanding.
                                            @elseif(session('locale')=='pt')
                                                Não oferecemos acesso sem guia da equipe do Jardim, nem passeios privativos.
                                                Sabemos que muitas pessoas que gostariam de visitar este jardim não podem esperar.
                                                Lamentamos sinceramente e pedimos sua compreensão.
                                            @else
                                                No ofrecemos acceso sin guía del Jardín, ni a recorridos privados. 
                                                Estamos conscientes de que muchas personas que quisieran visitar este jardín no pueden esperar. 
                                                Lo lamentamos sinceramente y pedimos su comprensión.
                                            @endif        
                                        </div>
                                    </div>
                                </div>
                                <!--ITEM 3-->
                                <div class="accordion-item-recorridos">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            @if(session('locale')=='en')
                                                Why is the number of visitors per group limited?
                                            @elseif(session('locale')=='pt')
                                                Por que o número de visitantes por grupo é limitado?
                                            @else
                                                ¿Por qué se limita el número de visitantes por grupo?
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            @if(session('locale')=='en')
                                                For the safety of our visitors and the plants, the Garden can only be visited on guided tours.
                                                Each group is made up of 30 people and they are offered from Monday to Saturday at different times.
                                            @elseif(session('locale')=='pt')
                                                Para segurança dos nossos visitantes e das plantas, o Jardim só pode ser visitado em visitas guiadas.
                                                Cada grupo é formado por 30 pessoas e é oferecido de segunda a sábado em horários diferentes.
                                            @else
                                                Por seguridad de nuestr@s visitantes y de las plantas, el Jardín sólo puede ser visitado en recorridos guiados. 
                                                Cada grupo se conforma de 30 personas y se ofrecen de lunes a sábado en diferentes horarios.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!--S3 RECORRIDOS-ESCOLARES-->
    <section class="recorridos-escolares" id="escolares">
        <div class="container pt-4">
            <div class="row justify-content-around py-5 px-4">
                <div class="col-sm-12 col-md-9 col-lg-8 col-xl-5 col-xxl-4 escuelas-texto py-5">
                    <div class="row">
                        <div class="col">
                            <h2 class="subtitulo">
                                @if(session('locale')=='en')
                                    School<br>tours
                                @elseif(session('locale')=='pt')
                                    Passeios<br>escolares
                                @else
                                    Recorridos<br>escolares
                                @endif
                            </h2>
                            <p>
                                @if(session('locale')=='en')
                                    We are pleased to offer free school tours for national public and private educational mexican institutions.
                                    These require reservations and are offered at the following times.
                                @elseif(session('locale')=='pt')
                                    Estamos muito satisfeitos em poder oferecer passeios escolares gratuitos para instituições de ensino público e privado do mexico.
                                    Estes requerem reserva e são ministrados nos seguintes horários.
                                @else
                                    Nos da mucho gusto poder ofrecer recorridos escolares gratuitos para instituciones de educación pública privada nacionales. 
                                    Estos requieren de reservación y se imparten en los siguientes horarios.
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if(session('locale')=='en')
                                <h3>Schedules</h3>
                                <h4>Duration 1 hour</h4>
                                <p>Monday to Friday<br>8:00 a.m. to 10:00 a.m. <br> 1:00 p.m. to 3:00 p.m. <br><br>Saturdays<br>8:00 a.m. to 10:00 a.m.</p>
                            @elseif(session('locale')=='pt')
                                <h3>Horários</h3>
                                <h4>Duração 1 hora</h4>
                                <p>Segunda a sexta<br>8h00 às 10h00<br> 13h00 às 15h00<br><br>Sábados<br>8h00 às 10h00< /p>
                            @else
                                <h3>Horarios</h3>
                                <h4>Duración 1 hora</h4>
                                <p>Lunes a viernes<br>8:00 a 10:00 horas <br> 13:00 a 15:00 horas <br><br>Sábados<br>8:00 a 10:00 horas</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3>
                                @if(session('locale')=='en')
                                @elseif(session('locale')=='pt')
                                @else
                                    Reservación
                                @endif
                            </h3>
                            <p>
                                @if(session('locale')=='en')
                                    To schedule a tour on the date and time of your preference, we ask that you send us, at least 3 weeks in advance, 
                                    a signed request on school letterhead to the following email:
                                @elseif(session('locale')=='pt')
                                    Para agendar um passeio na data e horário de sua preferência, solicitamos que você nos direcione,
                                    Com pelo menos 3 semanas de antecedência, uma solicitação assinada em papel timbrado da escola para:
                                @else
                                    Para agendar un recorrido en la fecha y horario de su preferencia, solicitamos nos dirijan,
                                    con al menos 3 semanas de anticipación, una solicitud firmada en papel membretado de la escuela, al correo: 
                                @endif
                                <a href="mailto:etnobotanico@infinitummail.com" class="nolink">etnobotanico@infinitummail.com</a>.
                            </p>
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
                                        <h3 class="w-100">
                                            @if(session('locale')=='en')
                                                School trip to the Ethnobotanical Garden of Oaxaca
                                            @elseif(session('locale')=='pt')
                                                Visita escolar ao Jardim Etnobotânico de Oaxaca
                                            @else
                                                Recorrido escolar en el Jardín Etnobotánico de Oaxaca
                                            @endif
                                        </h3>
                                    </a>
                                </div>
                                <div>
                                    <a href="imagenes/slider-3/img-02.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-02.jpg" alt="Guía y alumnos en el Jardín Etnobotánico">
                                        <h3 class="w-100">
                                            @if(session('locale')=='en')
                                                School trip to the Ethnobotanical Garden of Oaxaca
                                            @elseif(session('locale')=='pt')
                                                Visita escolar ao Jardim Etnobotânico de Oaxaca
                                            @else
                                                Recorrido escolar en el Jardín Etnobotánico de Oaxaca
                                            @endif
                                        </h3>
                                    </a>
                                </div>
                                <div>
                                    <a href="imagenes/slider-3/img-03.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-03.jpg" alt="Grupo recorriendo el Jardín">
                                        <h3 class="w-100">
                                            @if(session('locale')=='en')
                                                School trip to the Ethnobotanical Garden of Oaxaca
                                            @elseif(session('locale')=='pt')
                                                Visita escolar ao Jardim Etnobotânico de Oaxaca
                                            @else
                                                Recorrido escolar en el Jardín Etnobotánico de Oaxaca
                                            @endif
                                        </h3>
                                    </a>
                                </div>
                                <div>
                                    <a href="imagenes/slider-3/img-04.jpg" data-fancybox="gallery3">
                                        <img src="imagenes/slider-3/img-pre-04.jpg" alt="Grupo recorriendo el Jardín">
                                        <h3 class="w-100">
                                            @if(session('locale')=='en')
                                                School tour of San Andrés Chicahuaxtla, November 2024 | Photo: Enrique Scheinvar
                                            @elseif(session('locale')=='pt')
                                                Passeio escolar do San Andrés Chicahuaxtla, novembro de 2024 | Foto: Enrique Scheinvar
                                            @else
                                                Recorrido escolar de San Andrés Chicahuaxtla, noviembre, 2024 | Foto: Enrique Scheinvar
                                            @endif
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
