<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JardinSigModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_jardinsig';
	protected $primaryKey = 'sig_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'sig_plid',
        'sig_act',
        'sig_camid',
        'sig_campus',
        'sig_x',
        'sig_y',

        'sig_identificador',
        'sig_iconid',
        'sig_color1',
        'sig_color2',
        'sig_notas',

        'sig_flag1',
        'sig_flag2',
        'sig_flag3',
        'sig_flag4',
        'sig_flag5',

        'sig_usr',
    ];
}
