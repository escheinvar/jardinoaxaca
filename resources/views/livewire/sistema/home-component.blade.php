<div>
    @section('title')Inicio @endsection
    @section('cintillo')Inicio <hr class="titulo">@endsection
    
        Hola {{auth()->user()->usrname}}<BR>
        Este es tu home de usuario {{auth()->user()->email}}

        <h4>Mis roles</h4>
        @foreach (session('rol') as $i)
            {{$i}}            
        @endforeach
        
        @if(in_array('1', session('rol')))
            base:admin,
        @endif
        
        @if(in_array('2', session('rol')))
            base:web master
        @endif
    <h3>Menú sistema gral</h3>
    <ul>
        <li>Catálogo Instituciones</li>
        <li>Catálogo de roles</li>
    </ul>


    <h3>Menú plantas</h3>
    <ul>
        <li> Catálogo de Jardines/Campus/Camellones</li>
        <li> Catálogo de lenguas</li>
        <li> Catálogo de etiquetas de foto</li>
    </ul>
</div>
