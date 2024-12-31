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
                        Dr. Alejandro de Ávila Blomberg
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
                            <h4>Director</h4>
                            <p>Dr. Alejandro de Ávila Blomberg
                                
                            <h4>Administración</h4>
                            <!--p>C. P. Bertha Canseco Ruíz</p-->
                            <p>.</p>

                            <h4>Biblioteca</h4>
                            <!--p>Biól. Ana Ruiz Velasco</p-->
                            <p>.</p>

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
                                <!--li>Lic. Tania Araliz Hernández Velasco</li-->
                                <!--li>Biól. Issis Quetzali Moreno López</li-->
                                <li>.</li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Arq. Valeria Rubio García</li>
                                <li>Biól. Geovanni Martínez Guerra</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row horticultores pt-3 pb-5">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                            <h3 class="subtitulo">Horticultores</h3>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Sra. Gabriela Navarro Reyes</li>
                                <li>Sra. Mariela Pérez López</li>
                                <li>Srita. Gabriela Talledos Robles</li>
                                <li>Sr. Roberto Avendaño Rendón</li>
                                <li>Sr. Jesús Cruz Cruz</li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <ul>
                                <li>Sr. Alfonso Flores Santiago</li>
                                <li>Sr. Saúl Hernández Santiago</li>
                                <li>Sr. Daniel Ramírez Pérez</li>
                                <li>Sr. Norberto Rodríguez Ramírez</li>
                                <li>Sr. Lucio Ruíz Velasco</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row horticultores pt-3 pb-5">
                <div class="col">
                    <div class="row subtitulo justify-content-end">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                            <h3 class="subtitulo">Investigadores por México</h3>
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
