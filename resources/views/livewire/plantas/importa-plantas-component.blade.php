@section('title')
Carga Masiva de plantas
@endsection
@section('cintillo')
    Carga masiva de datos -> plantilla
@endsection

<div>
    <h1>Carga Masiva de datos de plantas</h1>


    <!-- --------------------------------------------------------------------------->
    <!-- ----------------------------- Carga archivo ---------------------------- -->
    <form wire:submit.prevent="importFile">
        <div style="float: right;">
            <button type="button" wire:click="exportFile" class="btn btn-secondary"><i class="bi bi-download"></i> Descargar formato</button>
        </div>

        <div class="row my-3" style="clear:right;">
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-7">
                <div class="form-group">
                    <label>Archivo de relación de ejemplares</label>
                    <input type="file" wire:model="file" class="form-control">
                    @error('file')<error>{{$message}}</error>@enderror
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <br>
                <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Cargar archivo</button>
            </div>


            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>¡Lo siento!</strong> Hay algunos problemas con tu formato.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- --------------------------------------------------------------------------->
            <!-- ----------------------------- Manual de uso ---------------------------- -->
            <div>
                <span onclick="VerNoVer('ver','manual')" style="cursor: pointer;">
                    <i class="bi bi-question-circle"></i>
                </span>

                <div class="m-5 p-3" id="sale_vermanual" style="border:1px solid black;display:none;">
                    <h5>Manual del archivo "Relación de ejemplares"</h5>
                    Archivo csv ó excel, que contiene el registro tomado en el jardín, de cada uno de sus ejemplares.
                    El archivo debe contener cuando menos las siguientes 23 columnas.<br>
                    El primer renglón debe contener los nombres de cada columna, tal y como se enlistan abajo observando las minúsculas, sin espacios ni acentos. El orden en el que se presentan, puede variar.<br>
                    Si el archivo consta de más columnas (o los nombres no son los correctos), éstas serán ignoradas.

                    <h5>Columnas</h5>
                    <ol>
                        <li><b>camellon</b> <red>*</red>Campo obligatorio (todos los registros deben contener valor). Texto con el nombre del camellón en el que se encuentra el ejemplar.
                                Para evitar errores de mapeo, debe estar escrito tal y como está registrado en el sistema inlcuyendo espacios, mayúsculas y minúsculas.
                                (<u onclick="VerNoVer('ver','Camellones')" style="cursor: pointer;"> Ver nombre de camellones</u>)
                                <span id="sale_verCamellones" style="display:none;">
                                    @foreach ($camellones as $c)
                                        {{ $c }},
                                    @endforeach
                                    @if(count($camellones) =='0')
                                        -- No hay camellones registrados en el sistema --
                                    @endif
                                </span>
                        </li>
                        <li><b>label</b> <red>*</red>Campo obligatorio (todos los registros deben contener valor). Texto con el nombre único ó etiqueta única del ejemplar. No puede haber dos ejemplares con el mismo label. Va a ser incorporado como "id de campo" en el sistema.
                        </li>
                        <li><b>x</b>  <red>*</red>Campo obligatorio (todos los registros deben contener valor). Número decimal con la latitud del ejemplar dentro del camellón. Puede tener hasta 12 decimales.
                        </li>
                        <li><b>y</b> <red>*</red>Campo obligatorio (todos los registros deben contener valor). Número decimal con la longitud del ejemplar dentro del camellón. Puede tener hasta 12 decimales.
                        </li>
                        <li><b>sciname</b> (Opcional) Texto con el nombre científico del ejemplar.</li>
                        <li><b>comname</b> (Opcional) Texto con el nombre común del ejemplar.</li>
                        <li><b>obsejemplar</b> (Opcional) Texto con las observaciones referentes al ejemplar.</li>
                        <li><b>obsubica</b> (Opcional) Texto con las observaciones referentes a la ubicación del ejemplar.</li>
                        <li><b>obscaptura</b> (Opcional) Texto con las observaciones adicionales realizadas durante la captura de datos.</li>
                        <li><b>fotolugar</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía indicativa de la ubicación del ejemplar dentro del camellón.</li>
                        <li><b>foto1</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía 1 del ejemplar.</li>
                        <li><b>foto2</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía 2 del ejemplar. </li>
                        <li><b>foto3</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía 3 del ejemplar. </li>
                        <li><b>foto4</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía 4 del ejemplar. </li>
                        <li><b>foto5</b> (Opcional) Texto con el nombre del archivo que contiene la fotografía 5 del ejemplar. </li>
                        <li><b>date</b> (Opcional) Texto con la fecha en la que se realizó la toma de datos en el jardín.</li>
                        <li><b>flag1</b> (Opcional) Número de referencia indicador de algún aspecto opcional determinado por quien toma los datos en campo. </li>
                        <li><b>flag2</b> (Opcional) Número de referencia indicador de algún aspecto opcional determinado por quien toma los datos en campo. </li>
                        <li><b>flag3</b> (Opcional) Número de referencia indicador de algún aspecto opcional determinado por quien toma los datos en campo. </li>
                        <li><b>flag4</b> (Opcional) Número de referencia indicador de algún aspecto opcional determinado por quien toma los datos en campo. </li>
                        <li><b>flag5</b> (Opcional) Número de referencia indicador de algún aspecto opcional determinado por quien toma los datos en campo. </li>
                        <li><b>comunidad</b> Valor predeterminado 1. Número que indica la cantidad de especies distintas que se están reportando en el mismo registro.
                            En caso de requerirse un valor mayor a uno, indicarlo, sin embargo en estos casos, el registro requerirá
                            un tratamiento especial de corrección en el sistema para separar cada una de las especies en su propio registro</li>
                        <li><b>ramet</b> (Opcional). Para el caso del registro de especies clonales en los que se puede diferenciar cada uno de
                            los individuos, el ramet indica el número de individuos clonales que conforman el genet.</li>

                    </ol>
                    Ningún texto puede ser mayor a 250 caracteres.

                </div>
            </div>
        </div>
    </form>

    <!-- --------------------------------------------------------------------------->
    <!-- --------------------------- carga fotos ----------------------------------->
    <form wire:submit="save" enctype="multipart/form-data">
        @csrf
        <div class="row my-3">
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-7">
                <div class="form-group">
                    <label>Imágenes anexas</label>
                    <input type="file" wire:model="fotos" class="form-control" multiple>
                    @error('fotos')<error>{{$message}}</error>@enderror
                    <span style="font-size:100%;">
                        Si marca error, guardar manualmente en: /cargaMasiva
                        (<span onclick="VerNoVer('ver','Archivos')" style="cursor: pointer;"> Ver archivos</span>)
                        <div id="sale_verArchivos" style="font-size:70%;display:none">
                            @foreach($imagenes as $i)
                                {{ $i }},
                            @endforeach
                        </div>
                    </span>
                </div>

            </div>

            <div class="col-sm-12 col-md-4">
                <br>
                <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Cargar imágenes</button>
            </div>


            @if (session()->has('message2'))
                <div class="alert alert-success">{{ session('message2') }}</div>
            @endif

        </div>
    </form>

    <br>
    <!-- --------------------------------------------------------------------------->
    <!-- ------------------- TABLA DE EJEMPLARES ----------------------------------->
    <table class="table table-striped">
        <thead>
            <tr scope="col">
                <th wire:click="ordenTabla('imp_id')" style="cursor: pointer;">
                    Id
                </th>
                <th wire:click="ordenTabla('imp_label')" style="cursor: pointer;">
                    Label
                </th>
                <th wire:click="ordenTabla('imp_camellon')" style="cursor: pointer;">
                    Camellón
                </th>
                <th wire:click="ordenTabla('imp_sciname')" style="cursor: pointer;">
                    Nombre científico
                </th>
                <th wire:click="ordenTabla('imp_comname')" style="cursor: pointer;">
                    Nombre común
                </th>
                <th wire:click="ordenTabla('imp_x')" style="cursor: pointer;">
                    Coords
                    <span wire:click="ordenTabla('imp_x')" style="cursor: pointer;"> X </span>
                    <span wire:click="ordenTabla('imp_y')" style="cursor: pointer;"> Y </span>
                </th>
                <th>
                    Observaciones:
                    <span wire:click="ordenTabla('imp_obsejemplar')" style="cursor: pointer;">ejemplar</span>/
                    <span wire:click="ordenTabla('imp_obsubica')" style="cursor: pointer;">ubicación</span>/
                    <span wire:click="ordenTabla('imp_obscaptura')" style="cursor: pointer;">captura</span>
                </th>
                <th>
                    Fotos
                </th>
                <th wire:click="ordenTabla('imp_date')" style="cursor: pointer;">
                    Fecha carga
                </th>
                <th wire:click="ordenTabla('imp_id')" style="cursor: pointer;">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $i)
                <?php $mierror='0'; ?>
                <tr>
                    <!-- -------------------------- ID ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_id }}
                    </td>

                    <!-- -------------------------- Label ------------------------------ -->
                    <th style="background-color: @if($i->imp_comunidad > 1) #CD7B34;color:#efebe8; @elseif($i->imp_act=='0') #87796d;@endif">
                        {{ $i->imp_label }}

                        @if($i->imp_comunidad > '1')
                            <?php $mierror++ ?>
                            <div style="margin:5px;" wire:click="Desagrupar('{{ $i->imp_id }}')">
                                <button type="button" class="btn btn-primary">Desagrupar  {{ $i->imp_comunidad }} <i class="bi bi-hammer"></i> </button>
                            </div>
                        @endif

                        @if(in_array(strtolower($i->imp_label),$labels1))
                            <div>
                                <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Error</i><br>
                                <span style="font-size: 70%;color:red">Ya existe en el sistema</span>
                            </div>
                        @endif
                    </th>

                    <!-- -------------------------- Camellón------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_camellon }}
                        @if(!in_array($i->imp_camellon,$camellones))
                            <?php $mierror++ ?>
                            <div>
                                <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Error</i><br>
                                <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No registrado en el sistema</span></i>
                            </div>
                        @endif

                    </td>

                    <!-- -------------------------- Nombre cientìfico ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_sciname }}
                    </td>

                    <!-- -------------------------- Nombre común ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_comname }}
                    </td>

                    <!-- -------------------------- X Y ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif max-width:30px;" class="cortaTexto">
                        {{ $i->imp_x }}<br>{{ $i->imp_y }}<br>
                        @if(!is_numeric($i->imp_x) OR $i->imp_x <= -180 OR $i->imp_x >= 180)
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Error</i><br>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Longitud errónea</span></i>
                        @endif
                        @if(!is_numeric($i->imp_y) OR $i->imp_y <= -90 OR $i->imp_y >= 90)
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Error</i><br>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">Latitud errónea</span></i>
                        @endif
                    </td>

                    <!-- -------------------------- Observaciones ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        <span style="font-size: 70%;">
                            {{ $i->imp_obsejemplar }}
                            @if($i->imp_obsubica != '')<br>{{ $i->imp_obsubica }}@endif
                            @if($i->imp_obscaptura != '')<br>{{ $i->imp_obscaptura }}@endif
                        </span>
                    </td>

                    <!-- -------------------------- Fotos ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_fotolugar }}
                        @if( $i->imp_fotolugar!='' AND $i->imp_fotolugar!='' AND !in_array($i->imp_fotolugar, $imagenes) )
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                        {{ $i->imp_foto1 }}
                        @if( $i->imp_foto1!='' AND !in_array($i->imp_foto1, $imagenes) )
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                        {{ $i->imp_foto2 }}
                        @if( $i->imp_foto2!='' AND !in_array($i->imp_foto2, $imagenes) )
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                        {{ $i->imp_foto3 }}
                        @if( $i->imp_foto3!='' AND !in_array($i->imp_foto3, $imagenes) )
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                        {{ $i->imp_foto4 }}
                        @if( $i->imp_foto4!='' AND !in_array($i->imp_foto4, $imagenes) )
                            <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                        {{ $i->imp_foto5 }}
                        @if( $i->imp_foto5!='' AND !in_array($i->imp_foto5, $imagenes) )
                        <?php $mierror++ ?>
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;"></i>
                            <span style="font-size: 70%;@if($i->imp_act=='0') color:#CDC6B9 @else color:red @endif;">No foto</span></i><br>
                        @endif
                    </td>

                    <!-- -------------------------- Fecha ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        {{ $i->imp_date }}
                    </td>

                    <!-- -------------------------- Opciones ------------------------------ -->
                    <td style="@if($i->imp_act=='0' OR $i->imp_comunidad > 1) background-color:#87796d; @endif">
                        @if($i->imp_comunidad > '1')
                            <i wire:click="Desagrupar('{{ $i->imp_id }}')" style="cursor: pointer;" class="bi bi-hammer"></i>
                        @endif
                        <!-- --- ícono play/pausa -->
                        <i class="@if($i->imp_act=='1') bi bi-pause-circle @else bi bi-play-circle @endif" wire:click="pause({{ $i->imp_id }})" style="cursor:pointer;margin:7px;"></i><br>
                        <!-- --- ícono de errores -->
                        @if($mierror > 0)
                            <i class="bi bi-bug-fill" style="@if($i->imp_act=='0' or $i->imp_comunidad > 1) color:#CDC6B9 @else color:red @endif;">{{ $mierror }}</i><br>
                        @endif
                        <!-- --- ícono de basura -->
                        @if($i->imp_act=='0')
                            <i class="bi bi-trash" wire:click="delete({{ $i->imp_id }})" style="cursor: pointer; margin:7px;" wire:confirm="Estas por borrar el registro '{{ $i->imp_label }}'\n¿Deseas continuar?" ></i>
                        @else
                            <a href="/importaPlantas_ver/{{ $i->imp_id }}" class="nolink" style="margin:7px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        @if($items->count() > 0)
            <a href="/importaPlantas_ver/{{ $items->pluck('imp_id')->first() }}">
                <button type="button" class="btn btn-primary"> <i class="bi bi-pencil-square"></i> Iniciar Revisión</button>
            </a>
        @endif
    </div>
</div>
