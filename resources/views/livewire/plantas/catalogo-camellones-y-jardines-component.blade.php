
@section('title')
    Catálogo de camellones
@endsection
@section('cintillo')
    Catálogo: Camellones
@endsection



<div>
    <h2>Catálogo: camellones / Campus / Jardines</h2>

    <!-- -------------------------------------------------------------------------------------->
    <!-- --------------------------------------- JARDINES/CAMPUS ------------------------------>
    <!-- -------------------------------------------------------------------------------------->
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-6">
            <label>Jardín / Campus :</label> {{ $jardin }}<br>
            <select wire:model.live="jardin" class="form-select" style="width:100%;display:inline-block;">
                @foreach ($jardines as $jar)
                    <option value="{{ $jar->ccam_id }}"> {{ $jar->cjar_name }} / {{ $jar->ccam_name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-6">
            <img src="/avatar/jardines/{{ $jardines->where('ccam_id',$jardin)->value('cjar_logo') }}" style="width: 70px;">

            <a href="/catalogo/camellon/0" style="float: right;">
                <button class="btn btn-secondary mx-2"> <i class="bi bi-plus-circle"> Nuevo camellón</i></button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <b>Nombre del Jardín</b>: {{ $jardines->where('ccam_id',$jardin)->value('cjar_nombre') }}
            <b>Siglas</b>: {{ $jardines->where('ccam_id',$jardin)->value('cjar_siglas') }} <br>
            <b>Dirección del Jardín</b>: {{ $jardines->where('ccam_id',$jardin)->value('cjar_direccion') }}<br>
            <b>Tel.</b>: {{ $jardines->where('ccam_id',$jardin)->value('cjar_tel') }}
            <b>Mail</b>: {{ $jardines->where('ccam_id',$jardin)->value('cjar_mail') }}
            <hr>
            <b>Nombre del campus</b>: {{ $jardines->where('ccam_id',$jardin)->value('ccam_nombre') }}<br>
            <b>Nombre corto del campus</b>: {{ $jardines->where('ccam_id',$jardin)->value('ccam_name') }}<br>
            <b>Dirección del campus</b>:  {{ $jardines->where('ccam_id',$jardin)->value('ccam_direccion') }}<br>
        </div>
    </div>

    <br>
    <div class="row">
        @if($camellones->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <div>
                                <div class="TipoTabla" style="width:50px"><b>Id</b></div>
                                <div class="TipoTabla" style="width:150px"><b>Camellón<br>Nombre</b></div>
                                <div class="TipoTabla" style="width:300px"><b>Camellón<br>Nombre largo</b></div>
                                <div class="TipoTabla" style="width:200px"><b>Zona<br>Nombre</b></div>
                                <div class="TipoTabla" style="width:200px"><b>Zona<br>Nombre largo</b></div>
                                <div class="TipoTabla" style="width:100px"> Mapa </div>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($camellones as $c)
                        <tr>
                            <td>
                                <div>
                                    <!-- ---------- ID --------- -->
                                    <div class="TipoTabla" style="width:50px;">
                                        {{ $c->cam_id }}
                                    </div>

                                    <!-- ---------- Camellón Nombre --------- -->
                                    <div class="TipoTabla" style="width:150px;">
                                        <b>{{ $c->cam_camellon }}</b>
                                    </div>

                                    <!-- ---------- Camellón nombre largo --------- -->
                                    <div class="TipoTabla" style="width:300px;">
                                        {{ $c->cam_camellonname }}
                                    </div>


                                    <!-- ---------- Zona Nombre--------- -->
                                    <div class="TipoTabla" style="width:200px;">
                                        {{ $c->cam_zona }}
                                    </div>


                                    <!-- ---------- Zona Nombre largo--------- -->
                                    <div class="TipoTabla" style="width:200px;">
                                        {{ $c->cam_zonaname }}
                                    </div>

                                    <!-- ---------- caracts --------- -->
                                    <div class="TipoTabla" style="width:100px;">
                                        @if($c->cam_mapa != '' )
                                            <i class="bi bi-map" style="color:{{ $c->cam_color }}"></i>
                                        @endif
                                        @if($c->cam_ctrox != '' AND $c->cam_ctroy != '' )
                                            <i class="bi bi-pin-map" style="color:{{ $c->cam_color }}"></i>
                                        @endif

                                    </div>

                                    <!-- ---------- caracts --------- -->
                                    <div class="TipoTabla">
                                        <a href="/catalogo/camellon/{{ $c->cam_id }}">
                                            <i class="bi bi-pencil-square PaClick"></i>
                                        </a>  &nbsp; &nbsp;
                                        <i class="bi bi-trash PaClick"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            -- no hay camellones en este campus --
        @endif
    </div>

</div>
