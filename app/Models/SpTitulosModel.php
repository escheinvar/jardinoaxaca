<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpTitulosModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'sp_titulos';
	protected $primaryKey = 'tit_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'tit_act',
        'tit_orden',
        'tit_name',
        'tit_titulo',
        'tit_descip',
    ];
}
