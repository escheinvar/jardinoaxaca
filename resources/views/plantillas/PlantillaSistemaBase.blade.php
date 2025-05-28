<!DOCTYPE html>
<html lang="es">

<head>
    @include('plantillas.plant_Head')
    @livewireStyles
</head>

<body>
    @livewireScripts
    <!-- ---------------------- Menú -------------------------->
    <header>
        <!--NAVBAR-->
        @include('plantillas.plant_MenuSist')
    </header>

    <!-- ---------------------- Barra de sistema -------------------------->
    <div style="background-color:#CDC6B9;  padding-left:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;padding:3px;">
        <b>Sistema del Jardín</b> &nbsp; | &nbsp; <b>{{ Auth::user()->usrname }}</b> &nbsp; | &nbsp;
        {{-- @include('plantillas.plant_tamanios') | --}}
        @yield('cintillo')
    </div>

    <!-- ---------------------- slot de livewire  -------------------------->
    @if(isset($slot))
        <div class="p-5" style="background-color:#efebe8;">
            <!-- ---------------------- CARGA DE LIVEWIRE ------------------------------->
            {{ $slot }}
        </div>
    @endif


    <!-- ------------------------ FOOTTER------------------------------->
    @include('plantillas.plant_Footer')

    <!-- ------------------------ SCRIPTS------------------------------->
    @include('plantillas.SistemaScripts')
    @yield('scripts')



</body>

</html>
