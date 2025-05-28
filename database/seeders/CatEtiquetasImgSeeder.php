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

            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'portada',          'cimg_descripcion'=>'Imágen principal de la cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppalvideo1',       'cimg_descripcion'=>'Primer video del lateral superior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppalvideo2',       'cimg_descripcion'=>'Segundo video del lateral superior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppalvideo3',       'cimg_descripcion'=>'Tercer video del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal1',            'cimg_descripcion'=>'Primer imágen del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal2',            'cimg_descripcion'=>'Segunda mágen del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal3',            'cimg_descripcion'=>'Tercer imágen del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal4',            'cimg_descripcion'=>'Cuarta imágen del lateral superior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal5',            'cimg_descripcion'=>'Quinta imágen del lateral superior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal6',            'cimg_descripcion'=>'Sexta imágen del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateralvideo1',    'cimg_descripcion'=>'Primer video del lateral inferior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateralvideo2',    'cimg_descripcion'=>'Primer video del lateral inferior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateralvideo3',    'cimg_descripcion'=>'Primer video del lateral inferior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'ppal',            'cimg_descripcion'=>'Otras imágenes del lateral superior de cédula de especie'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral1',            'cimg_descripcion'=>'Primer Imágen del lateral inferior de cédula de especie -gralmente mapa de distri-'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral2',            'cimg_descripcion'=>'Segunda imágen del lateral inferior de cédula de especie -gralente  herbario-'],
            ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral3',            'cimg_descripcion'=>'Tercer imágen del lateral inferior de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral4',            'cimg_descripcion'=>'Cuarta imágen del lateral inferior de cédula de especie -'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral5',            'cimg_descripcion'=>'Quinta imágen del lateral inferior de cédula de especie -'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'lateral',            'cimg_descripcion'=>'Otras imágenes del lateral inferior de cédula de especie -'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'cinta1',            'cimg_descripcion'=>'Primer cinta de imágenes en texto de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'cinta2',            'cimg_descripcion'=>'Segunda  cinta de imágenes en texto de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'cinta3',            'cimg_descripcion'=>'Tercer  cinta de imágenes en texto de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'cinta4',            'cimg_descripcion'=>'Cuarta  cinta de imágenes en texto de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'cinta5',            'cimg_descripcion'=>'Quinta  cinta de imágenes en texto de cédula de especie'],
            // ['cimg_gral'=>'especie', 'cimg_tipo'=>'cedula',      'cimg_name'=>'parrafo',            'cimg_descripcion'=>'Sexta  cinta de imágenes en texto de cédula de especie'],

            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'proceso',  'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
            // ['cimg_gral'=>'planta', 'cimg_tipo'=>'uso',      'cimg_name'=>'',            'cimg_descripcion'=>''],
        ];
        if(CatEtiquetasImgModel::count()=='0'){
            foreach ($events as $event){
                CatEtiquetasImgModel::create($event);
            }
        }
    }
}
