<?php

namespace Database\Seeders;

use App\Models\SpUrlCedulaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpUrlCedulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            ['ced_id'=>'1',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'huaje','ced_clencode'=>'spa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Huaje. Cédulas públicas, http://jardinoaxaca/especies.'],
            ['ced_id'=>'2',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'huaje','ced_clencode'=>'huv','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Huaje. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al ombeayiüts (huave), Noé Pinzón Palafox.'],
            ['ced_id'=>'3',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'huaje','ced_clencode'=>'zai','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Huaje. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al  didxazá (zapoteco del Istmo), Nelson Guerra.'],
            ['ced_id'=>'4',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'huaje','ced_clencode'=>'xta','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Huaje. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al tu\'un savi (mixteco), Juana Mendoza Ruiz'],
            ['ced_id'=>'5',  'ced_act'=>'1', 'ced_edo'=>'0', 'ced_urlurl'=>'huaje','ced_clencode'=>'maa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Huaje. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al én-ná (mazateco), Gabriela García García'],

            ['ced_id'=>'6',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'sabino','ced_clencode'=>'spa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Sabino. Cédulas públicas, http://jardinoaxaca/especies.'],
            ['ced_id'=>'7',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'sabino','ced_clencode'=>'huv','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Sabino. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al ombeayiüts (huave), Noé Pinzón Palafox.'],
            ['ced_id'=>'8',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'sabino','ced_clencode'=>'zai','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Sabino. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al  didxazá (zapoteco del Istmo), Nelson Guerra.'],
            ['ced_id'=>'9',  'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'sabino','ced_clencode'=>'xta','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Sabino. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al tu\'un savi (mixteco), Juana Mendoza Ruiz'],
            ['ced_id'=>'10', 'ced_act'=>'1', 'ced_edo'=>'0', 'ced_urlurl'=>'sabino','ced_clencode'=>'maa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Sabino. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al én-ná (mazateco), Gabriela García García'],

            ['ced_id'=>'11', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'grana','ced_clencode'=>'spa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Grana. Cédulas públicas, http://jardinoaxaca/especies.'],
            ['ced_id'=>'12', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'grana','ced_clencode'=>'huv','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Grana. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al ombeayiüts (huave), Noé Pinzón Palafox.'],
            ['ced_id'=>'13', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'grana','ced_clencode'=>'zai','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Grana. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al didxazá (zapoteco del Istmo), Nelson Guerra.'],
            ['ced_id'=>'14', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'grana','ced_clencode'=>'xta','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Grana. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al  tu\'un savi (mixteco), Juana Mendoza Ruiz'],
            ['ced_id'=>'15', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'grana','ced_clencode'=>'maa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Grana. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al én-ná (mazateco), Gabriela García García'],

            ['ced_id'=>'16', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'abejasinaguijon','ced_clencode'=>'spa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Abejas sin aguijón. Cédulas públicas, http://jardinoaxaca/especies.'],
            ['ced_id'=>'17', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'abejasinaguijon','ced_clencode'=>'huv','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Abejas sin aguijón. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al ombeayiüts (huave), Noé Pinzón Palafox.'],
            ['ced_id'=>'18', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'abejasinaguijon','ced_clencode'=>'zai','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Abejas sin aguijón. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al  didxazá (zapoteco del Istmo), Nelson Guerra.'],
            ['ced_id'=>'19', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'abejasinaguijon','ced_clencode'=>'xta','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Abejas sin aguijón. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al tu\'un savi (mixteco), Juana Mendoza Ruiz'],
            ['ced_id'=>'20', 'ced_act'=>'1', 'ced_edo'=>'5', 'ced_urlurl'=>'abejasinaguijon','ced_clencode'=>'maa','ced_cjarsiglas'=>'JebOax', 'ced_cita'=>'Jardín Etnobiológico de Oaxaca, 2024. Abejas sin aguijón. Cédulas públicas, http://jardinoaxaca/especies.<br>Traducción al én-ná (mazateco), Gabriela García García'],


        ];

        if(SpUrlCedulaModel::count()=='0'){
            foreach ($events as $event){
                ##### En producción
                SpUrlCedulaModel::create($event);
            }
        }
    }
}
