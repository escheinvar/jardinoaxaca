<?php

namespace Database\Seeders;

use App\Models\ImportaPlantasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImportPlantasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(ImportaPlantasModel::count()=='0'){
            $hoy=date('Y-m-d');
            Storage::copy('aPublic/iconos/MagueyBlanco.png','aPublic/cargaMasiva/00_EjemploMaguey.png');
            Storage::copy('aPublic/iconos/MagueyBlanco.png','aPublic/cargaMasiva/00_EjemploMaguey1.png');
            Storage::copy('aPublic/iconos/ArbustoVaraBlanco.png','aPublic/cargaMasiva/00_EjemploVara.png');
            Storage::copy('aPublic/iconos/ArbustoVaraBlanco.png','aPublic/cargaMasiva/00_EjemploVara1.png');
            Storage::copy('aPublic/iconos/GlobosaBlanco.png','aPublic/cargaMasiva/00_EjemploGlobosa.png');
            Storage::copy('aPublic/iconos/GlobosaBlanco.png','aPublic/cargaMasiva/00_EjemploGlobosa1.png');

            Storage::copy('aPublic/iconos/MagueyBlanco.png','aPublic/cargaMasiva/00_EjemploMaguey2.png');
            Storage::copy('aPublic/iconos/GlobosaBlanco.png','aPublic/cargaMasiva/00_EjemploGlobosa2.png');
            Storage::copy('aPublic/iconos/NopalBlanco.png','aPublic/cargaMasiva/00_EjemploNopal.png');
        }

        $events=[
            [
                'imp_act'=>'1',
                'imp_camellon'=>'A1a',
                'imp_label'=>'Inventa1',
                'imp_sciname'=>'Agave potatorum',
                'imp_comname'=>'Maguey Tobalá',
                'imp_x'=>'-96.721977363454',
                'imp_y'=>'17.065628432421',
                'imp_comunidad'=>'1',
                'imp_ramet'=>'1',
                'imp_obsejemplar'=>'Ejemplar inventado',
                'imp_obsubica'=>'Ubicación inventada',
                'imp_obscaptura'=>'Creado como dato de prueba',
                'imp_fotolugar'=>'00_EjemploMaguey.png',
                'imp_foto1'=>'00_EjemploMaguey1.png',
                'imp_date'=>$hoy,
            ], [
                'imp_act'=>'1',
                'imp_camellon'=>'A1a',
                'imp_label'=>'Inventa2',
                'imp_sciname'=>'Fouquieria shrevei',
                'imp_comname'=>'Vara de José',
                'imp_x'=>'-96.7220122144951',
                'imp_y'=>'17.0656406119398',
                'imp_comunidad'=>'1',
                'imp_ramet'=>'1',
                'imp_obsejemplar'=>'Ejemplar inventado',
                'imp_obsubica'=>'Ubicación inventada',
                'imp_obscaptura'=>'Creado como dato de prueba',
                'imp_fotolugar'=>'00_EjemploVara.png',
                'imp_foto1'=>'00_EjemploVara1.png',
                'imp_date'=>$hoy,
            ], [
                'imp_act'=>'1',
                'imp_camellon'=>'A1a',
                'imp_label'=>'Inventa3',
                'imp_sciname'=>'Mammilaria scheinvariana',
                'imp_comname'=>'Mammilaria scheinvariana',
                'imp_x'=>'-96.7220497463854',
                'imp_y'=>'17.0656374068033',
                'imp_comunidad'=>'1',
                'imp_ramet'=>'5',
                'imp_obsejemplar'=>'Ejemplar inventado. Colonia de 5 cabezas.',
                'imp_obsubica'=>'Ubicación inventada',
                'imp_obscaptura'=>'Creado como dato de prueba',
                'imp_fotolugar'=>'00_EjemploGlobosa.png',
                'imp_foto1'=>'00_EjemploGlobosa1.png',
                'imp_date'=>$hoy,
            ], [
                'imp_act'=>'0',
                'imp_camellon'=>'A1a',
                'imp_label'=>'Comunidad1',
                'imp_sciname'=>'Agave isthmensis, No sé, Opuntia sp',
                'imp_comname'=>'Maguey enano, cabeza de turco, Nopal',
                'imp_x'=>'-96.7220657463854',
                'imp_y'=>'17.0656354068033',
                'imp_comunidad'=>'3',
                'imp_ramet'=>'7,4,1',
                'imp_obsejemplar'=>'Comunidad de 3 especies inventadas',
                'imp_obsubica'=>'Rodal de especies inventado',
                'imp_obscaptura'=>'Creado como dato de prueba',
                'imp_fotolugar'=>'00_EjemploMaguey2.png',
                'imp_foto1'=>'00_EjemploGlobosa2.png',
                'imp_foto3'=>'00_EjemploNopal.png',
                'imp_date'=>$hoy,
            ],
        ];

        if(ImportaPlantasModel::count()=='0'){
            foreach ($events as $event){
                ImportaPlantasModel::create($event);
            }
        }
    }
}
