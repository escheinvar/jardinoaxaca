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
        {{$i}},
        {{-- {{$roles->where('crol_id',$i)->value('crol_mod')}}-{{$roles->where('crol_id',$i)->value('crol_rol')}}, --}}
    @endforeach


    <h3>Módulo de admin sistema</h3>
    <ul>
        <li> Catálogo de roles : (base: admin/web/usr)</li>
        <li> Catálogo de usuarios</li>
        <li> Catálogo de instituciones (de personas que se registran)</li>
    </ul>

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

    <h3>Módulo de cédulas audibles</h3>
    <ul>
        <li> <a href="/catalogo/campus">Catálogo de jardines y campus =ModuJardines</a></li>
        <li> <a href="/catCedulas">Catálogo de cédulas</a> (solo admin de cédulas)</li>
        <li> Ver Cédulas: <a href="/sp/huaje/0">Huaje</a>,  <a href="/sp/sabino/0">Sabino</a>,  <a href="/sp/melipona/0">Abejas Meliponas </a>, <a href="/sp/grana/0">Grana cochinilla</a></li>
    </ul>

    <h3>Faltantes</h3>
    <ol>
        <li>Jardines: Módulo para vaciar las imágenes de carpeta /cargaMasiva que no están en la tabla pl_import (campos de fotos)</li>
        <li>Cédulas: Módulo para vaciar imágenes que no estan en sp_cedulas (txt_audio, txt_img1-3, txt_video) o en sp_fotos
    </ol>

</div>
