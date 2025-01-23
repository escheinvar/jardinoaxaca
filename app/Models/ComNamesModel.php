<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComNamesModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_comnames';
	protected $primaryKey = 'comn_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'comn_plid',
        'comn_act',

        'comn_nombre',
        'comn_clenid',
        'comn_regiones',
        'scn_tipo',

        'comn_audio1',
        'comn_audio2',
        'comn_video1',
        'comn_video2',

        'comn_usr',
        'comn_autoridad',
        'comn_autoridaddate',
    ];
}
