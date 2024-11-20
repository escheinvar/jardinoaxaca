<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatCamellonesModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'cat_camellones';
	protected $primaryKey = 'cam_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'cam_ccamid',
        'cam_zona',
        'cam_camellon',
        'cam_zonaname',
        'cam_camellonname',
        'cam_color',
        'cam_notas',
        'cam_mapa',
    ];
}
