<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CatCamellonesModel;
use App\Models\CatLenguasInaliModel;
use App\Models\CatLenguasModel;
use App\Models\SpTitulosModel;
use App\Models\SpUrlCedulaModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            #### Genera catálogos
            InstitucionesSeeder::class,
            userSeeder::class, ##### En producción
            CatRolesSeeder::class,
            userRolesSeeder::class, ##### En producción

            CatJardinesCampusSeeder::class,
            CatCamellonesSeeder::class,

            CatLenguasSeeder::class,
            CatLenguasInaliSeeder::class,

            webEventosSeeder::class, ##### En producción
            CatIconosSeeder::class,
            ImportPlantasSeeder::class,
            CatEtiquetasImgSeeder::class,
            CatEntidadesSeeder::class,


            SpUrlSeeder::class, ##### En producción
            SpUrlCedulaSeeder::class, ##### En producción
            SpCedulaSeeder::class, ##### En producción
            SpFotosSeeder::class, ##### En producción
        ]);
    }
}
