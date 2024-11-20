<div>
    <div class="container">
        <!-- -------------------------------------- FRANJA CLASIFICACIÓN ----------------------------------------------->
        <div style="overflow:auto; background-color:#CDC6B9; border-radius:8px; margin:5px; padding:15px; color: #87796d; font-family: 'Roboto Condensed', sans-serif;">
            <div style="display:inline-block;">
                <b> Clavo: {{$clavo}} &nbsp; &nbsp; | &nbsp; &nbsp;

                <span class="d-none d-xl-inline-block">xl ExtraGrande</span>
                <span class="d-none d-lg-inline-block d-xl-none">lg Grande</span>
                <span class="d-none d-md-inline-block d-lg-none">md Mediano</span>
                <span class="d-none d-sm-inline-block d-md-none ">sm Chico</span>
                <span class="d-xs-block d-sm-none">sm Extrachico</span>
            </div>
            <div style="display:inline-block;">
                &nbsp; &nbsp; &nbsp;  | &nbsp; &nbsp;
                <i class="bi bi-filetype-pdf" style="cursor: pointer;"></i>
            </div>
            <div style="display:inline-block; float: inline-end;">
                <select wire:model.live="NvoId" wire:change="CambiarPagina()" class="form-control" style="width: 200px; display:inline-block; background-color:white;" >
                    <option value='buscar'>Seleccionar</option>
                    @foreach ($clavos as $i)
                        <option value="{{$i}}">{{$i}}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" style="width: 200px; display:inline-block; background-color:white;" placeholder="Buscar clavo"> --}}
            </div>
        </div>




        <!-- -------------------------------------- BLOQUE SUPERIOR FICHA E IMAGENES ----------------------------------------------->
        <div class="row" style="margin:5px; border-radius:8px; ">

            <!-- ------------------------- FICHA GENERAL IZQUIERDA ------------------------>
            <div class="col-sm-12 col-md-4 col-lg-3 text-wrap" style="padding:10px; background-color:#CDC6B9; border-top-left-radius:8px;">
                
                <!-- ------------------------- Nombre científico ------------------------>
                <div style="color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center;font-weigth:bold;" >
                    @if($datos)
                        <div class="pt-4 d-block d-md-none"          style="font-size:150%;">ID: {{$datos->clave}} <br> {{$datos->generoyesp}}</div>
                        <div class="pt-4 d-none d-md-block d-lg-none"style="font-size:120%;">ID: {{$datos->clave}} <br> {{$datos->generoyesp}}</div>
                        <div class="pt-4 d-none d-lg-block"          style="font-size:140%;">ID: {{$datos->clave}} <br> {{$datos->generoyesp}}</div>
                    @else
                        <div class="pt-4 d-none d-lg-block"          style="font-size:140%;">ID: clavo <br> Género y Especie</div>
                    @endif
                </div>

                <!-- ------------------------- Nombre Común ------------------------>
                <div style="color:#202d2d; font-family: 'Noto Serif JP', serif; text-align:center; font-weight:100;" >
                    @if($datos)
                        <div class="py-4 d-block d-md-none"          style="font-size:120%;"> - {{$datos->nombrecomu}} </div>
                        <div class="py-4 d-none d-md-block d-lg-none"style="font-size:80%;">  - {{$datos->nombrecomu}} </div>
                        <div class="py-4 d-none d-lg-block"          style="font-size:110%;"> - {{$datos->nombrecomu}} </div>
                    @else
                        <div class="py-4 d-none d-lg-block"          style="font-size:110%;"> - Nombre común </div>
                    @endif
                </div>
                
                <!-- ------------------------- Categoría de riesgo ------------------------>
                <div>
                    <button class="btn" style="background-color:#B1153F; color:#efebe8; 
                        border-radius:0.5rem; text-align:center; padding:1px 10px; margin:5px;"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="E: Probablemente Extinta en Medio Silvestre">
                        @if($datos)
                            @if($datos->hayclavo =='1') 
                                Clavo: {{$datos->clavofisic}} 
                            @else
                                No hay clavo {{$datos->clavofisic}}
                            @endif
                        @else
                            No hay clavo
                        @endif
                    </button>
                </div>

                <!-- ------------------------- Ejemplares del jardín ------------------------>
                <div class="container-fluid my-4" style="color:#64383E;font-size:70%;">
                    <div class="row pb-2" style="">
                        @if($datos)
                            <p>Notas ubicación: {{$datos->notasubica}}</p>

                            <p>Observaciones: {{$datos->observacio}}</p>

                            <p>Forma: {{$datos->forma}}</p>
                        @else
                            <p>Notas ubicación: </p>

                            <p>Observaciones: </p>

                            <p>Forma: </p>
                        @endif
                        
                    </div>                   
                </div>
            </div>

            <!-- ------------------------- FOTO DE LA PORTADA ------------------------>
            <div class="col-sm-12 col-md-6 col-lg-7">
                @if($datos and $datos->foto1 != '')
                    <img src="/FotosKobo/{{$datos->foto1}}" 
                        class="py-2 py-sm-2 py-md-0 py-lg-0 img-fluid"
                        style="heigth:100%;">
                @endif
            </div>
 
            <!-- ------------------------- GALERÍA DE FOTOGRAFÍAS ------------------------>
            <div class="col-sm-12 col-md-2 col-lg-2 center">
                @if($datos)
                    <!-- flecha -->
                    <div class="center" style="text-align: center;">
                        <i class="bi bi-arrow-up-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
                    </div>

                    <!-- img -->
                    <div class="center">
                        @if($datos->foto2 != '')
                            <img  src="/FotosKobo/{{$datos->foto2}}" 
                                style="cursor: pointer;" 
                                class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        @endif
                    </div>

                    <!-- img -->
                    <div class="center">
                        @if($datos->foto3 != '')
                            <img  src="/FotosKobo/{{$datos->foto3}}" 
                                style="cursor: pointer;" 
                                class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        @endif
                    </div>

                    <!-- img -->
                    <div class="center">
                        @if($datos->archivo1 != '')
                            <img  src="/FotosKobo/{{$datos->archivo1}}" 
                                style="cursor: pointer;"
                                class="img-fluid mt-1 mt-sm-1 mt-md-1 mt-lg-1">
                        @endif
                    </div>

                    <!-- flecha -->
                    <div class="center" style="text-align: center;">
                        <i class="bi bi-arrow-down-circle" style="font-size: 170%; color:#87796d;; cursor: pointer;"></i>
                    </div>
                @endif
            </div>
        </div>
        
        


        <!-- -------------------------------------- FRANJA INFO ----------------------------------------------->
        {{-- <div class="row" style="margin:5px; border-bottom-left-radius:8px; background-color:#87796d;">
            <!-- -------------- Menú izquierdo ----------------->
            <div class="col-2" style="color:#efebe8;padding:40px;">
               Izq                
            </div>

            <!-- -------------- Texto central ----------------->
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="background-color:#87796d;">
                    Inicio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tempora rerum fugit voluptates itaque nobis mollitia aspernatur, quisquam eos perspiciatis labore maxime deleniti eveniet? Optio dolorem eum molestias modi recusandae?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tempora rerum fugit voluptates itaque nobis mollitia aspernatur, quisquam eos perspiciatis labore maxime deleniti eveniet? Optio dolorem eum molestias modi recusandae?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tempora rerum fugit voluptates itaque nobis mollitia aspernatur, quisquam eos perspiciatis labore maxime deleniti eveniet? Optio dolorem eum molestias modi recusandae?
            </div>
            
            <!-- -------------- Imágenes derecha ----------------->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="background-color:#87796d;">
                <img src="https://cch2.org/imglib/cch2/RSA_VascularPlants/RSA0437/RSA0437578.jpg"
                    style="width:100%;  padding:15px;">
            </div>
            
            
        </div> --}}

        {{-- <div class="row" style="margin:5px; border-bottom-left-radius:8px; background-color:#87796d;">
            <div class="col-12" style="">
                Pie
            </div>
        </div> --}}

    </div>
</div>
