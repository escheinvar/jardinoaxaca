<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEtiquetasImgModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'cat_fotoplantaslabel';
	protected $primaryKey = 'cimg_id';
	public $incrementing = false;
	#protected $keyType = 'string';

    protected $fillable = [
        'cimg_gral',
        'cimg_tipo',
        'cimg_name',
        'cimg_descripcion',
    ];
}
