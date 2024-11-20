<?php

namespace Database\Seeders;

use App\Models\CatEtiquetasImgModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEtiquetasImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'ubicacion','cimg_name'=>'vista-norte', 'cimg_descripcion'=>'Imagen en la que se distingue la ubicación del ejemplar dentro del jardín'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'ubicacion','cimg_name'=>'vista-sur',   'cimg_descripcion'=>'Imagen en la que se distingue la ubicación del ejemplar dentro del jardín'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'ubicacion','cimg_name'=>'vista-este',  'cimg_descripcion'=>'Imagen en la que se distingue la ubicación del ejemplar dentro del jardín'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'ubicacion','cimg_name'=>'vista-oeste', 'cimg_descripcion'=>'Imagen en la que se distingue la ubicación del ejemplar dentro del jardín'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'planta',   'cimg_name'=>'Planta',      'cimg_descripcion'=>'Imagen del especímen en la que se aprecia la planta completa'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'planta',   'cimg_name'=>'Flor',        'cimg_descripcion'=>'Imagen del especímen en la que se observa la flor en general'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'planta',   'cimg_name'=>'Frutos',      'cimg_descripcion'=>'Imagen del especímen en la que se observa el fruto completo'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'planta',   'cimg_name'=>'Hojas',       'cimg_descripcion'=>'Imagen del especímen en la que se observan las hojas en general'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'flor',     'cimg_name'=>'Pétalos',     'cimg_descripcion'=>'Imagen del especímen que muestra detalle de sus pétalos'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'flor',     'cimg_name'=>'Gineceo',     'cimg_descripcion'=>'Imagen del especímen que muestra el detalle de su gineceo'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'flor',     'cimg_name'=>'Androceo',    'cimg_descripcion'=>'Imagen del especímen que muestra el detalle de su androceo'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'especie',  'cimg_name'=>'General',     'cimg_descripcion'=>'Imagen del especímen como ejemplar típico de la especie'],
            ['cimg_gral'=>'planta', 'cimg_tipo'=>'especie',  'cimg_name'=>'Herbario',    'cimg_descripcion'=>'Imagen del ejemplar de herbario del especímen'],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'proceso',  'cimg_name'=>'',            'cimg_descripcion'=>''],
        ];
        
        foreach ($events as $event){
            CatEtiquetasImgModel::create($event);
        }
    }
}
