<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatIconosModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'cat_iconos';
	protected $primaryKey = 'icon_id';
	public $incrementing = false;
	#protected $keyType = 'string';

    protected $fillable = [
        'icon_name',
        'icon_nombre',
        'icon_file',
        'icon_coleccion',
        'icon_sizex',
        'icon_sizey',
        'icon_col1',
        'icon_col2',
        'icon_descripcion',
    ];
}


