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
            ['clen_id'=>'1',    'clen_nombre'=>'Español',   'clen_region'=>'México'],
        ];
        
        foreach ($events as $event){
            CatLenguasModel::create($event);
        }
    }
}
