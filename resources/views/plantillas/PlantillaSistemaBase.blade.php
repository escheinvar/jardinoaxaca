<!DOCTYPE html>
<html lang="es">
    
<head>
    @include('plantillas.SistemaHead')
</head>

<body>
    @livewireScripts
    <!-- ---------------------- Menú -------------------------->
    <header>
        <!--NAVBAR-->
        @include('plantillas.SistemaHeader')
    </header>
    
    <!-- ---------------------- Barra de sistema -------------------------->
    <div style="background-color:#CDC6B9;  padding-left:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;">
        <b>Sistema del JEB Oax</b> | 
    </div>
    
    <!-- ---------------------- slot de livewire  -------------------------->
    @if(isset($slot))
        <div class="p-5" style="background-color:#efebe8;">
            <!-- ---------------------- CARGA DE LIVEWIRE ------------------------------->
            {{ $slot }}
        </div>
    @endif


    <!-- ------------------------ FOOTTER------------------------------->
    @include('plantillas.SistemaFooter')

    <!-- ------------------------ SCRIPTS------------------------------->
    @include('plantillas.SistemaScripts')
    @yield('scripts')

    
    
</body>

</html>