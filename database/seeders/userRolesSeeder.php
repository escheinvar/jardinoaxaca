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
        UserRolesModel::create([
            'rol_id'=>'1',
            'rol_act'=>'1',
            'rol_usrid'=>'1',
            'rol_crolid'=>'1',
            'rol_describe'=>'base:admin',
        ]);
    }
}
