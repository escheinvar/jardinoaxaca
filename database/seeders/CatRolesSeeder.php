<?php

namespace Database\Seeders;

use App\Models\CatRolesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['crol_mod'=>'base', 'crol_rol'=>'admin',        'crol_describe'=>'Administrador General del sistema'],
            ['crol_mod'=>'base', 'crol_rol'=>'webmaster',    'crol_describe'=>'Web master'],
            ['crol_mod'=>'base', 'crol_rol'=>'usr',          'crol_describe'=>'Usuario general del sistema'],
            ['crol_mod'=>'base', 'crol_rol'=>'cedulas',      'crol_describe'=>'Administrador de cédulas de jardín'],
        ];

        foreach ($events as $event){
            CatRolesModel::create($event);
        }
    }
}
