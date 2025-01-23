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
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Ninguno',     'cimg_descripcion'=>'Etiqueta inicial. Indica que la imagen no va a ser utilizada'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Ubicación',   'cimg_descripcion'=>'Imagen en la que se distingue la ubicación del ejemplar dentro del jardín'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Planta',      'cimg_descripcion'=>'Imagen del especímen en la que se aprecia la planta completa'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Tallo',       'cimg_descripcion'=>'Imagen del especímen en la que se aprecia el tallo'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Tronco',      'cimg_descripcion'=>'Imagen del especímen en la que se aprecia el tronco'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Flor',        'cimg_descripcion'=>'Imagen del especímen en la que se observa la flor'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Frutos',      'cimg_descripcion'=>'Imagen del especímen en la que se observa el fruto'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Conos',       'cimg_descripcion'=>'Imagen del especímen en la que se observa el cono reproductivo'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Hojas',       'cimg_descripcion'=>'Imagen del especímen en la que se observan las hojas'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',   'cimg_name'=>'Raíces',      'cimg_descripcion'=>'Imagen del especímen en la que se observan las raíces'],

            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',     'cimg_name'=>'Pétalos',     'cimg_descripcion'=>'Imagen del especímen que muestra detalle de sus pétalos'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',     'cimg_name'=>'Gineceo',     'cimg_descripcion'=>'Imagen del especímen que muestra el detalle de su gineceo'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',     'cimg_name'=>'Androceo',    'cimg_descripcion'=>'Imagen del especímen que muestra el detalle de su androceo'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'ejemplar',     'cimg_name'=>'General',     'cimg_descripcion'=>'Imagen del especímen como ejemplar típico de la especie'],
            ['cimg_gral'=>'plantas', 'cimg_tipo'=>'herbario',     'cimg_name'=>'Herbario',    'cimg_descripcion'=>'Imagen del ejemplar de herbario del especímen'],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'proceso',  'cimg_name'=>'',            'cimg_descripcion'=>''],
        ];

        foreach ($events as $event){
            CatEtiquetasImgModel::create($event);
        }
    }
}
