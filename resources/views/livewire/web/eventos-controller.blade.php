<div>
    


@section('title') 
Actividades
@endsection

@section('meta-description')
¿Tienes interés en la botánica, la ecología o la historia de Oaxaca? Conoce las diversas conferencias, talleres y actividades que tenemos para ti.
@endsection

@section('banner')
banner-actividades
@endsection

@section('banner-title') 
Eventos
@endsection


@section('main-superior')
@endsection


@section('main-inferior')
@endsection


    <!--S1 PROXIMAMENTE-->
    <section class="proximamente pt-4 pb-3">
        <div class="container px-4 py-5" id="bienvenido">
            <h2 class="subtitulo">Próximamente </h2>
            @foreach ($eventosProx as $i)
                <article class="evento">
                    <div class="row justify-content-around p-5">
                        <div class="col-sm-5 col-md-5 col-lg-3 cartel">
                            <img src="{{$i->wwevs_img}}" alt="Cartel {{$i->wwevs_titulo}}"
                                class="img-fluid">
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 descripcion">
                            <h3 class="evento-nombre">
                                {{$i->wwevs_titulo}}
                            </h3>
                            <div class="etiquetas">
                                <ul class="tags">
                                    <?php 
                                        $etiqs=explode(',',$i->wwevs_label)
                                    ?>
                                    @foreach ($etiqs as $e)
                                        <li class="tag-{{$e}}">{{$e}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="evento-descripcion">
                                <p>{{$i->wwevs_descrip}}</p>
                                @if($i->wwevs_descrip2 != '') <p>{{$i->wwevs_descrip2}}</p> @endif
                            </div>
                        </div>
                        <div class=" col-sm-11 col-md-12 col-lg-3 px-4 pt-3 datos-evento ">
                            <div class="row horario">
                                <div class="col-sm-6 col-md-3 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-reloj.png" alt="icono reloj">
                                        </div>
                                        <div class="col">
                                            <p>{{substr($i->wwevs_timeini,-8,5)}} 
                                                @if($i->wwevs_timefin !='') - {{substr($i->wwevs_timefin,-8,5)}}  @endif horas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-calendario.png" alt="icono calendario">
                                        </div>
                                        <div class="col">
                                            <p>{{substr($i->wwevs_dateini,-2)}} de {{$mes[intval(substr($i->wwevs_dateini,-5,2))]}} 
                                                @if($i->wwevs_datefin != $i->wwevs_dateini) a<br>{{substr($i->wwevs_datefin,-2)}} de {{$mes[intval(substr($i->wwevs_datefin,-5,2))]}} @endif</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-5 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-mapa.png" alt="icono lugar">
                                        </div>
                                        <div class="col">
                                            <p>{{$i->wwevs_lugar}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-12 col-lg-12 p-0">
                                    <div class="row">
                                        <h5>{{$i->wwevs_costo}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>    
            @endforeach
        </div>
    </section>

    <!--S2 EVENTOS ANTERIORES-->
    <a name="SeccionAnteriores"></a>
    <section class="eventos-anteriores pt-4 pb-3">
        <div class="container px-4 py-5" id="bienvenido">
            <h2 class="subtitulo">Eventos anteriores </h2>
            @if($eventosPast->hasPages())
                Página: {{$eventosPast->currentPage()}}
            @endif

            @foreach ($eventosPast as $i)
                <article class="evento">
                    <div class="row justify-content-around p-5">
                        <div class="col-sm-5 col-md-5 col-lg-3 cartel">
                            <img src="{{$i->wwevs_img}}" alt="Cartel {{$i->wwevs_titulo}}"
                                class="img-fluid">
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 descripcion">
                            <h3 class="evento-nombre">
                                {{$i->wwevs_titulo}}
                            </h3>
                            <div class="etiquetas">
                                <ul class="tags">
                                    <?php 
                                        $etiqs=explode(',',$i->wwevs_label)
                                    ?>
                                    @foreach ($etiqs as $e)
                                        <li class="tag-{{$e}}">{{$e}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="evento-descripcion">
                                <p>{{$i->wwevs_descrip}}</p>
                                @if($i->wwevs_descrip2 != '') <p>{{$i->wwevs_descrip2}}</p> @endif
                            </div>
                        </div>
                        <div class=" col-sm-11 col-md-12 col-lg-3 px-4 pt-3 datos-evento ">
                            <div class="row horario">
                                <div class="col-sm-6 col-md-3 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-reloj.png" alt="icono reloj">
                                        </div>
                                        <div class="col">
                                            <p>{{substr($i->wwevs_timeini,-8,5)}} 
                                                @if($i->wwevs_timefin !='') - {{substr($i->wwevs_timefin,-8,5)}}  @endif horas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-calendario.png" alt="icono calendario">
                                        </div>
                                        <div class="col">
                                            <p>{{substr($i->wwevs_dateini,-2)}} de {{$mes[intval(substr($i->wwevs_dateini,-5,2))]}} 
                                                @if($i->wwevs_datefin != $i->wwevs_dateini) a<br>{{substr($i->wwevs_datefin,-2)}} de {{$mes[intval(substr($i->wwevs_datefin,-5,2))]}} @endif de {{substr($i->wwevs_dateini,-10,4)}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-5 col-lg-12 p-0 pb-3">
                                    <div class="row">
                                        <div class="col-auto p-0">
                                            <img src="imagenes/icono-mapa.png" alt="icono lugar">
                                        </div>
                                        <div class="col">
                                            <p>{{$i->wwevs_lugar}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-12 col-lg-12 p-0">
                                    <div class="row">
                                        <h5>{{$i->wwevs_costo}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>    
            @endforeach

            @if($eventosPast->hasPages())
                <div class="paginador">
                    @if($eventosPast->onFirstPage()) @else 
                        <a href="{{$eventosPast->previousPageurl()}}#SeccionAnteriores">
                            <div class="boton abajo" style="display: inline-block;" ></div>
                        </a> 
                    @endif

                    @foreach (range(1,$eventosPast->lastPage()) as $page)
                        <a href="{{$eventosPast->url($page)}}#SeccionAnteriores">
                            <div class="pagina" style="display: inline-block;"> {{$page}} </div>
                        </a>
                    @endforeach

                    @if($eventosPast->onLastPage()) @else
                        <a href="{{$eventosPast->nextPageurl()}}#SeccionAnteriores">
                            <div class="boton arriba" style="display: inline-block;"> </div> 
                        </a>
                    @endif

                    {{-- <select wire:model.live="Cantidad" class="forma-select">
                        <option value='2'>2 eventos</option>
                        <option value='5'>5 eventos</option>
                        <option value='20'>20 eventos</option>
                        <option value='50'>50 eventos</option>
                    </select> --}}
                </div>
            @endif
        </div>
    </section>

</div>
