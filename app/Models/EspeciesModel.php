<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeciesModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'especies_prueba';
	protected $primaryKey = 'clave';
	public $incrementing = false;
	protected $keyType = 'string';

    protected $fillable = [
        'id',
        'idgrupo',
        'zona',
        'clave',
        'notasubica',
        'tipoid',
        'hayclavo',
        'clavofisic',
        'observacio',
        'forma',
        'color',
        'generoyesp',
        'nombrecomu',
        'foto1',
        'foto2',
        'foto3',
        'archivo1',
        'notas',
        'idkobo',
        'UUID',
        'archivo',
        'indexkobo',
        'captura',
        'x_corregid',
        'y_corregid',
        'taxonid',
        'revised',
        'rip',
    ];
}
