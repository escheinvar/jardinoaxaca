@section('title')
Inicio
@endsection
@section('cintillo')
Inicio
@endsection
<div>
    Hola {{auth()->user()->usrname}}<BR>
    <b>Usuario</b>: {{auth()->user()->email}}<BR>

    <b>Tus roles</b>:
    @foreach (session('rol') as $i)
        {{$i}}:{{$roles->where('crol_id',$i)->value('crol_mod')}}-{{$roles->where('crol_id',$i)->value('crol_rol')}},
    @endforeach


    <h3>Menú admin sistema</h3>
    <ul>
        <li> Catálogo de roles </li>
        <li> Catálogo de usuarios</li>
        <li> Catálogo de instituciones (de personas que se registran)</li>
    </ul>

    <h3>Menú de jardines</h3>
    <ul>
        <li><a href="/importaPlantas">Carga masiva de ejemplares de jardín</a> (solo resp-jardin)</li>
        <li><a href="/catalogo/campus">Catálogo de jardines y campus</a></li>
        <li><a href="/catalogo/camellones">Catálogo de camellones</a>(solo  base,admin o jardin,admin) (solo admin)</li>
        <li>Catálogo de íconos de mapa</li>
        <li>Catálogo de lenguas/pueblos</li>
        <li>Catálogo de etiquetas de fotos de plantas</li>
        <li>¿Catálogo de Kew?</li>
    </ul>

    <h3>Faltantes</h3>
    <ol>
        <li>Módulo para vaciar las imágenes de carpeta /cargaMasiva que no están en la tabla pl_import (campos de fotos)</li>
    </ol>

</div>
