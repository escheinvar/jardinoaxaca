<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SciNamesModel extends Model
{
    use HasFactory;
	protected $connection='pgsql';
	protected $table = 'pl_scinames';
	protected $primaryKey = 'scn_id';
	public $incrementing = true;
	#protected $keyType = 'string';

    protected $fillable = [
        'scn_plid',
        'scn_act',
        'scn_ckewtaxonid',
        'scn_tipo',
        'scn_fam',
        'scn_gen',
        'scn_sp',
        'scn_ssp',
        'scn_nombre',
        'scn_usr',
        'scn_autoridad',
        'scn_autoridaddate',
    ];
}
