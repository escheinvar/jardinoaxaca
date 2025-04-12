@section('title')
Inicio
@endsection
@section('cintillo')
Inicio &nbsp; &nbsp;
<!-- Buzón -->
<span class="PaClick" onclick="VerNoVer('ver','Buzon')" style="@if($buzon->where('buz_leido','0')->count() > 0) color:#CD7B34; font-weight:bold; @endif padding:5px; ">
    @if($buzon->where('buz_leido','0')->count() > 0 )
        <span style="border:1px solid #CD7B34;padding:1px;">
            <i class="bi bi-envelope-fill"></i>
            {{ $cuenta=$buzon->where('buz_leido','0')->count() }}
            @if($cuenta =='1')mensaje @else mensajes @endif
        </span>
    @else
        <i class="bi bi-envelope"></i> Buzón
    @endif

</span>
@endsection
<div>
    Hola <b>{{auth()->user()->usrname}}</b><BR>
    <b>Usuario</b>: {{auth()->user()->email}}<BR>

    <!-- ----------------------- Ver Roles ----------------------- -->
    <b>Tus roles</b>:
    @foreach (array_unique(session('rol')) as $i)
        {{$i}},
    @endforeach
    <!-- ----------------------- Buzón ----------------------- -->
    <div id="sale_verBuzon" style="display:none; margin:20px; ">
        <h3>Buzón</h3>
        @if($buzon->count() > 0)
            <table class="table table-striped" style="width:60%;border:1px solid black;">
                <tbody>

                    @foreach ($buzon as $b)
                    <tr >
                        <td class="p-3 m-2">
                            <span class="PaClick m-1 p-1" wire:click="LeerMensaje('{{ $b->buz_id }}')">
                                @if($b->buz_leido == '0')
                                    <i class="bi bi-eye"></i>
                                @else
                                    <i class="bi bi-eye-slash"></i>
                                @endif
                            </span>
                            <span style="@if($b->buz_leido =='1') color:gray; @endif">
                                <b>{{ $b->buz_asunto }}</b><br>
                                {{ $b->buz_mensaje }}<br>
                                <span style="font-size:80%;">
                                    @if($b->buz_notas != '') {{ $b->buz_notas }} <br> @endif
                                    ({{ $b->buz_date_origen }})
                                </span>
                            </span>
                            <span class="PaClick m-1 p-1" wire:click="BorrarMensaje('{{ $b->buz_id }}')"> <i class="bi bi-trash"> </i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            -- No tienes mensajes en tu buzón --
        @endif
    </div>



    <div>
    <li> Si soy cedula: Gestor de aportaciones de mi jardín: Mostrar aportaciones a cédulas (edo < 3) y aprobar (o no) cedulas de su jardín</li>
    <li> Si soy usr: ver mis aportaciones</li>

    </div>


    <!-- ----------------------- Módulo de Admin de sistema ----------------------- -->
    @if(in_array('admin',session('rol')))
        <h3>Módulo de admin sistema</h3>
        <ul>
            <li> <a href="/usuarios">Catálogo de usuarios (solo rol: admin)</a></li>
            <li> Catálogo de instituciones (de personas que se registran)</li>
            <li> <a href="/catalogo/campus">Catálogo de jardines y campus =ModuJardines</a></li>
        </ul>
    @endif

    @if(in_array('admin',session('rol')))
        <h3>Módulo de jardines</h3>
        <ul>
            <li><a href="/importaPlantas">Carga masiva de ejemplares de jardín</a> (solo resp-jardin)</li>
            <li><a href="/catalogo/campus">Catálogo de jardines y campus</a></li>
            <li><a href="/catalogo/camellones">Catálogo de camellones</a>(solo  base,admin o jardin,admin) (solo admin)</li>
            <li>Catálogo de íconos de mapa</li>
            <li>Catálogo de lenguas/pueblos</li>
            <li>Catálogo de etiquetas de fotos de plantas</li>
            <li>¿Catálogo de Kew?</li>
        </ul>
    @endif

    @if(in_array('traduce',session('rol')) OR in_array('cedulas',session('rol')))
        <h3>Módulo de cédulas audibles</h3>
        <ul>
            <li> <a href="/catCedulas">Catálogo de cédulas</a></li>
            <li> <a href="/especies"> Ver Cédulas publicadas</a></li>
        </ul>
    @endif

    @if(in_array('admin',session('rol')))
        <h3>Faltantes</h3>
        <ol>
            <li>Jardines: Módulo para vaciar las imágenes de carpeta /cargaMasiva que no están en la tabla pl_import (campos de fotos)</li>
            <li>Cédulas: Módulo para vaciar imágenes que no estan en sp_cedulas (txt_audio, txt_img1-3, txt_video) o en sp_fotos
        </ol>

        <a href="/pruebillas_php">Php info</a>
    @endif
</div>
