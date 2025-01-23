<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportaPlantasModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_import';
	protected $primaryKey = 'imp_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'imp_act',
        'imp_label',
        'imp_camellon',
        'imp_x',
        'imp_y',
        'imp_comunidad',
        'imp_ramet',
        'imp_sciname',
        'imp_comname',

        'imp_obsejemplar',
        'imp_obsubica',
        'imp_obscaptura',
        'imp_fotolugar',
        'imp_foto1',
        'imp_foto2',
        'imp_foto3',
        'imp_foto4',
        'imp_foto5',

        'imp_fotolabellugar',
        'imp_fotolabel1',
        'imp_fotolabel2',
        'imp_fotolabel3',
        'imp_fotolabel4',


        'imp_date',
        'imp_flag1',
        'imp_flag2',
        'imp_flag3',
        'imp_flag4',
        'imp_flag5',
        'imp_kew',
        'imp_iconid',
    ];
}
