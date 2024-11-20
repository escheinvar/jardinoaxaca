<!DOCTYPE html>
<html lang="es">
    
<head>
    @include('plantillas.SistemaHead')
</head>

<body>
    @livewireScripts

    <header>
        <!--NAVBAR-->
        @include('plantillas.SistemaHeader')
    </header>


    <div class="p-5" style="background-color:#efebe8;">
        @if(isset($slot))            
            <!-- ---------------------- CARGA DE LIVEWIRE ------------------------------->
            {{ $slot }}
        @endif
    </div>




    <!-- ------------------------ FOOTTER------------------------------->
    @include('plantillas.SistemaFooter')

    <!-- ------------------------ SCRIPTS------------------------------->
    @include('plantillas.SistemaScripts')
    @yield('scripts')
    
</body>

</html>