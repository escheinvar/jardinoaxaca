<div>
    @section('title')Inicio @endsection
    @section('cintillo')Inicio <hr class="titulo">@endsection
    
        Hola {{auth()->user()->usrname}}<BR>
        Este es tu home de usuario {{auth()->user()->email}}

        <h4>Mis roles</h4>
        @if(in_array('1', session('rol')))
            base:admin,
        @endif
        
        @if(in_array('2', session('rol')))
            base:usuario
        @endif
    
    
</div>
