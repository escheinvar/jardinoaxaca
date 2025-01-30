<?php

namespace Database\Seeders;

use App\Models\SpFotosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpFotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $events=[
            //Huaje
            ['imgsp_url'=>'1', 'imgsp_label'=>'16', 'imgsp_file'=>'huaje_portada.webp'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'17', 'imgsp_file'=>'huaje_principal_1.webp'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'18', 'imgsp_file'=>'huaje_principal_2.webp'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'19', 'imgsp_file'=>'huaje_principal_3.jpg'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'20', 'imgsp_file'=>'huaje_principal_4.jpeg'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'24', 'imgsp_file'=>'huaje_lateral_1.webp'],
            ['imgsp_url'=>'1', 'imgsp_label'=>'25', 'imgsp_file'=>'huaje_lateral_2.jpg'],
            //Sabino
            ['imgsp_url'=>'2', 'imgsp_label'=>'16', 'imgsp_file'=>'sabino_portada.webp'],
            ['imgsp_url'=>'2', 'imgsp_label'=>'17', 'imgsp_file'=>'sabino_principal_1.webp'],
            ['imgsp_url'=>'2', 'imgsp_label'=>'18', 'imgsp_file'=>'sabino_principal_2.webp'],
            ['imgsp_url'=>'2', 'imgsp_label'=>'24', 'imgsp_file'=>'sabino_lateral1.webp'],
            ['imgsp_url'=>'2', 'imgsp_label'=>'25', 'imgsp_file'=>'sabino_lateral_2.jpeg'],

            // ['imgsp_url'=>'1', 'imgsp_label'=>'', 'imgsp_file'=>''],
            // ['imgsp_url'=>'1', 'imgsp_label'=>'', 'imgsp_file'=>''],
            // ['imgsp_url'=>'1', 'imgsp_label'=>'', 'imgsp_file'=>''],

        ];

        foreach ($events as $event){
            SpFotosModel::create($event);
        }
    }
}
