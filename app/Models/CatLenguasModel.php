<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatLenguasModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'cat_lenguas';
	protected $primaryKey = 'clen_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'clen_nombre_esp',
        'clen_alias',
        'clen_nombre',
        'clen_codigo',
        'clen_region',
        'clen_observa',
        'clen_audio',
    ];
}
