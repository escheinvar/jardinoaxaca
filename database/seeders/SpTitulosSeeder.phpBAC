<?php

namespace Database\Seeders;

use App\Models\SpTitulosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpTitulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['tit_orden'=>'1', 'tit_name'=>'nombres', 'tit_titulo'=>'Nombres'],
            ['tit_orden'=>'2', 'tit_name'=>'nom_com', 'tit_titulo'=>'Nombre común'],
            ['tit_orden'=>'3', 'tit_name'=>'nom_cient', 'tit_titulo'=>'Nombre científico'],
            ['tit_orden'=>'4', 'tit_name'=>'distri', 'tit_titulo'=>'Distribución Geográfica'],
            ['tit_orden'=>'5', 'tit_name'=>'habitat', 'tit_titulo'=>'Hábitat'],
            ['tit_orden'=>'6', 'tit_name'=>'hist_nat', 'tit_titulo'=>'Historia Natural y Etnobiología'],
            // ['tit_orden'=>'7', 'tit_name'=>'etnobiol', 'tit_titulo'=>'Etnobiología'],
        ];

    foreach ($events as $event){
        SpTitulosModel::create($event);
    }
    }
}
