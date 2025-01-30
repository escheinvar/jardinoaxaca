<?php

namespace Database\Seeders;

use App\Models\SpUrlModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['url_reino'=>'pl', 'url_url'=>'huaje',    'url_nombrecomun'=>'Huaje',          'url_sp'=>'2346297'],
            ['url_reino'=>'pl', 'url_url'=>'sabino',   'url_nombrecomun'=>'Sabino, Ahuehuete',         'url_sp'=>'378578'],
            ['url_reino'=>'an', 'url_url'=>'melipona', 'url_nombrecomun'=>'Abeja melipona', 'url_sp'=>'1'],
            ['url_reino'=>'an', 'url_url'=>'grana',    'url_nombrecomun'=>'Grana cochinilla','url_sp'=>'2'],
            // ['url_reino'=>'pl', 'url_url'=>'', 'url_nombrecomun'=>'','url_sp'=>''],

        ];

    foreach ($events as $event){
        SpUrlModel::create($event);
    }
    }
}
