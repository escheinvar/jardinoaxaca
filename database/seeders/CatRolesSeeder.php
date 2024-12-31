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
            ['crol_id'=>'1', 'crol_mod'=>'base', 'crol_rol'=>'admin', 'crol_describe'=>'Administrador General del sistema'],
            ['crol_id'=>'2', 'crol_mod'=>'base', 'crol_rol'=>'web',   'crol_describe'=>'Web master'],
            ['crol_id'=>'3', 'crol_mod'=>'base', 'crol_rol'=>'usr',  'crol_describe'=>'Usuario general del sistema'],
        ];
        
        foreach ($events as $event){
            CatRolesModel::create($event);
        }
    }
}
