<?php

namespace Database\Seeders;

use App\Models\CatLenguasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatLenguasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['clen_id'=>'1','clen_codigo'=>'',  'clen_nombre'=>'Desconocido',   'clen_nombre_lengua'=>'Desconocido',   'clen_region'=>'Desconocido'],
            ['clen_id'=>'2','clen_codigo'=>'es', 'clen_nombre'=>'Español',   'clen_nombre_lengua'=>'Español',   'clen_region'=>'México'],
            ['clen_id'=>'3','clen_codigo'=>'en', 'clen_nombre'=>'Inglés',    'clen_nombre_lengua'=>'English',   'clen_region'=>'EUA'],
            ['clen_id'=>'4','clen_codigo'=>'pt', 'clen_nombre'=>'Portugués', 'clen_nombre_lengua'=>'Portugues', 'clen_region'=>'Brasil'],
            ['clen_id'=>'5','clen_codigo'=>'fr', 'clen_nombre'=>'Francés',   'clen_nombre_lengua'=>'France',    'clen_region'=>'Francia'],

            ['clen_id'=>'6','clen_codigo'=>'es_mix_bj', 'clen_nombre'=>'Mixteco Bajo',   'clen_nombre_lengua'=>'Tu`un Savi',    'clen_region'=>'Guerrero'],
            ['clen_id'=>'7','clen_codigo'=>'es_zp_va', 'clen_nombre'=>'Zapoteco de Valles',   'clen_nombre_lengua'=>'',    'clen_region'=>'Valles Centrales Oaxaca'],
            ['clen_id'=>'8','clen_codigo'=>'es_zp_is', 'clen_nombre'=>'Zapoteco del Istmo',   'clen_nombre_lengua'=>'',    'clen_region'=>'Istmo de Tehuantepec Oaxaca'],
        ];

        foreach ($events as $event){
            CatLenguasModel::create($event);
        }
    }
}
