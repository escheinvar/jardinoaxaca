<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpCedulasModel extends Model
{
    #use HasFactory;
	protected $connection='pgsql';
	protected $table = 'sp_cedulas';
	protected $primaryKey = 'ced_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'ced_act',
        'ced_url',
        'ced_lengua',
        'ced_jardin',
        'ced_reino',
        'ced_sp',
        'ced_titulo',
        'ced_order',
        'ced_codigo',
        'ced_audio',
        'ced_autor',
    ];
}
