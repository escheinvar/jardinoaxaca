@extends('plantillas.PlantillaPublicaGeneral')

@section('title') Jardín Etnobiológico de Oaxaca @endsection

@section('cintillo')
    <!--h3> Inicio</h3>
    <hr class="titulo"-->
@endsection

@section('main')
    <!-- ---------------------------------- CARRUSEL --------------------------------------->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-height:99%;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true" ></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://jardinoaxaca.mx/wp-content/themes/jetnobot/img/slider/slider13.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://jardinoaxaca.mx/wp-content/themes/jetnobot/img/slider/slider10.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://jardinoaxaca.mx/wp-content/themes/jetnobot/img/slider/slider14.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://jardinoaxaca.mx/wp-content/themes/jetnobot/img/slider/imagen7_pcgrande-min.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- -------------------------------- fin carrusel ---------------------------------------->

@endsection

