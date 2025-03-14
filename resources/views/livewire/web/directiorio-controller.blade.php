@section('title')
Directorio
@endsection

@section('meta-description')
Directorio: Grupo de diseño, Director, Responsables, Auxiliares docentes, Horticultores, Guías y Voluntarios del Jardín Etnobotánico de Oaxaca.
@endsection

@section('banner')
banner-directorio
@endsection

@section('banner-title')
Directorio
@endsection


<div>
    <!-- DIRECTORIO-->
    <section class="directorio pt-4">
        <div class="container px-4 py-5" id="bienvenido">
            <div>
                @include('plantillas/plant_locale')
            </div>

            <div class="row diseno justify-content-end pt-3 ">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 ">
                    <h2 class="subtitulo">Grupo de Diseño del Jardín</h2>
                    <p>
                        Maestro Francisco Toledo (†) <br>
                        Luis Zárate <br>
                        Dr. Alejandro de Ávila Blomberg (Director fundador)
                    </p>
                </div>
            </div>

            <div class="row responsables pt-3">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 ">
                            <h3 class="subtitulo">Responsables</h3>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <h4>Dirección</h4>
                            <p>Dr. Alejandro de Ávila Blomberg

                            <h4>Administración</h4>
                            <p>Lic. Guadalupe Ortega Aguilar</p>

                            <h4>Biblioteca</h4>
                            <p> Sra. Mariana Hortencia Muñoz Herrera</p>

                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <h4>Colecciones</h4>
                            <!--p>Ing. César Chávez-Rendón</p-->
                            <p>Biól. Geovanni Martínez Guerra</p>

                            <h4>Infraestructura y Eventos</h4>
                            <p>Maestro Jorge Juárez García</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row auxiliares pt-3">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 ">
                            <h3 class="subtitulo">Auxiliares docentes</h3>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Ing. Vianney Hernández Gómez</li>
                                <li>Biol. David Alejandro Velasco Filio</li>
                                <!--li>Lic. Tania Araliz Hernández Velasco</li-->
                                <!--li>Biól. Issis Quetzali Moreno López</li-->
                                <li>.</li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                {{-- <li>Arq. Valeria Rubio García</li> --}}
                                <li>Biol. Geovanni Martínez Guerra</li>
                                <li>Biol. Jacqueline Itzel Jiménez López</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row horticultores pt-3 pb-5">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                            <h3 class="subtitulo">Horticultor@s</h3>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Gabriela Herlinda Navarro Reyes</li>
                                <li>Mariela Pérez López</li>
                                <li>Gabriela Talledos Robles</li>
                                <li>Jesús Santiago Fernandez Silva</li>
                                <li>Jesús Cruz Cruz</li>
                                <li>Benjamín Gálvez Aguilar</li>
                                <li>Abdiel Mizraim Rodríguez Ramírez</li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Mauro Daniel Ramírez Pérez</li>
                                <li>Norberto Esteban Rodríguez Ramírez</li>
                                <li>Lucio Ruíz Velasco</li>
                                <li>Abad Morales Bernardo</li>
                                <li>Erika Isabel Castellanos Zavaleta</li>
                                <li>Carlos Miguel Ruiz Camacho</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row horticultores pt-3 pb-5">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                            <h3 class="subtitulo">Investigador@s por México</h3>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li><a href="#" class="nolink">Dra. Xitlali Aguirre Dugua</a></li>
                                <li><a href="#" class="nolink">Dra. Niza Gámez Tamariz</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li><a href="#" class="nolink">Dra. Mariana Zarazúa</a></li>
                                <li><a href="#" class="nolink">Dr. Enrique Scheinvar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
