<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CatCamellonesModel;
use App\Models\CatLenguasModel;
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
            userSeeder::class,
            CatRolesSeeder::class,
            userRolesSeeder::class,

            CatJardinesCampusSeeder::class,
            CatCamellonesSeeder::class,

            CatLenguasSeeder::class,
            webEventosSeeder::class,
            CatIconosSeeder::class,
            ImportPlantasSeeder::class,
            CatEtiquetasImgSeeder::class,
            CatEntidadesSeeder::class,
        ]);
    }
}
