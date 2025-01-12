<?php

namespace Database\Seeders;

use App\Models\CatIconosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatIconosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            [
                'icon_name'=>'arbolBl',
                'icon_nombre'=>'Árbol Blanco',
                'icon_file'=>'ArbolBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'magueyBl',
                'icon_nombre'=>'Maguey Blanco',
                'icon_file'=>'MagueyBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'nopalBl',
                'icon_nombre'=>'Nopal Blanco',
                'icon_file'=>'Nopal1Blanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'columnarBl',
                'icon_nombre'=>'Columnar Blanco',
                'icon_file'=>'Columnar1Blanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'globosaBl',
                'icon_nombre'=>'Globosa Blanco',
                'icon_file'=>'GlobosaBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'helechoBl',
                'icon_nombre'=>'Helecho Blanco',
                'icon_file'=>'HelechoBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'arbustoBl',
                'icon_nombre'=>'Arbusto Blanco',
                'icon_file'=>'ArbustoBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'herbaceaBl',
                'icon_nombre'=>'Herbácea Blanco',
                'icon_file'=>'HerbaceaBlanca.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'arbustoVaraBl',
                'icon_nombre'=>'Arbusto Vara Blanco',
                'icon_file'=>'ArbustoVaraBlanco.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'cicadaBl',
                'icon_nombre'=>'Cícada Blanco',
                'icon_file'=>'CicadaBlanca.png',
                'icon_coleccion'=>'plantas',
                'icon_sizex'=>'55',
                'icon_sizey'=>'55',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'palmaBl',
                'icon_nombre'=>'Palma Blanco',
                'icon_file'=>'PalmaBlanca.png',
                'icon_coleccion'=>'plantas',
                'icon_descripcion'=>'',
            ],[
                'icon_name'=>'orquideaBl',
                'icon_nombre'=>'Orquídea Blanco',
                'icon_file'=>'OrquideaBlanca.png',
                'icon_coleccion'=>'plantas',
                'icon_sizex'=>'35',
                'icon_sizey'=>'35',
                'icon_descripcion'=>'',
            ]
        ];

        foreach ($events as $event){
            CatIconosModel::create($event);
        }
    }
}

