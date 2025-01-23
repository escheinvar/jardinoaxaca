<?php

namespace Database\Seeders;

use App\Models\CatCampusModel;
use App\Models\CatJardinesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatJardinesCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            [
                'cjar_id'=>'1',
                'cjar_name'=>'Etnobiológico de Oaxaca',
                'cjar_nombre'=>'Jardín Etnobiológico de Oaxaca',
                'cjar_siglas'=>'JebOax',
                'cjar_tipo'=>'Etnobiológico',
                'cjar_direccion'=>'Reforma s/n, Independencia, Centro, Oaxaca de Juárez, Oaxaca. C.P. 68000 ',
                'cjar_tel'=>' 951 516 5325',
                'cjar_mail'=>'etnobotanico@infinitummail.com',
                'cjar_edo'=>'Oaxaca',
                'cjar_logo'=>'JebOax.png',
            ]
        ];

        foreach ($events as $event){
            CatJardinesModel::create($event);
        }

        $events=[
            [
                'ccam_id'=>'1',
                'ccam_act'=>'1',
                'ccam_cjarid'=>'1',
                'ccam_name'=>'Santo Domingo',
                'ccam_nombre'=>'Jardín Etnobiológico de Oaxaca',
                'ccam_direccion'=>'',
            ],[
                'ccam_id'=>'2',
                'ccam_act'=>'1',
                'ccam_cjarid'=>'1',
                'ccam_name'=>'Canteras',
                'ccam_nombre'=>'Jardín Etnobiológico de Oaxaca',
                'ccam_direccion'=>'',
            ]
        ];

        foreach ($events as $event){
            CatCampusModel::create($event);
        }
    }
}
