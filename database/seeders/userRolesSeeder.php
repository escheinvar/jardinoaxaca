<?php

namespace Database\Seeders;

use App\Models\UserRolesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $events=[
            [
                'rol_act'=>'1',
                'rol_usrid'=>'1',
                #'rol_crolid'=>'1',
                'rol_crolrol'=>'admin',
                'rol_describe'=>'Administrador del sistema',
            ],[
                'rol_act'=>'1',
                'rol_usrid'=>'1',
                #'rol_crolid'=>'2',
                'rol_crolrol'=>'webmaster',
                'rol_describe'=>'Web mastter',
            ],[
                'rol_act'=>'1',
                'rol_usrid'=>'1',
                #'rol_crolid'=>'1',
                'rol_crolrol'=>'cedulas',
                'rol_tipo1'=>'todas',
                'rol_describe'=>'Administrador del sistema',
            ]
        ];

        foreach ($events as $event){
            UserRolesModel::create($event);
        }

    }
}
