<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpFotosModel extends Model
{
    #use HasFactory;
	protected $connection='pgsql';
	protected $table = 'sp_fotos';
	protected $primaryKey = 'imgsp_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'imgsp_url',
        'imgsp_act',

        'imgsp_file',
        'imgsp_label',
        'imgsp_autor',
        'imgsp_titulo',
        'imgsp_date',
        'imgsp_descrip',
        'imgsp_metadata',
    ];
}
