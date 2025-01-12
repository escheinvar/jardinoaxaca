<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosPlantasModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_comnames';
	protected $primaryKey = 'comn_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'img_plid',
        'img_act',
        
        'img_file',
        'img_label',
        'img_autor',
        'img_titulo',
        'img_date',
        'img_descrip',
        'img_metadata',
    ];
}
