<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantasModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_plantas';
	protected $primaryKey = 'pl_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'pl_idcolecta',
        'pl_idjardin',
        'pl_idherbario',

        'pl_act',
        'pl_coleccion',
        'pl_plantula',
        'pl_fin',
        'pl_fintype',
        'pl_findate',
        'pl_label',
        'pl_obs',
    ];
}
