<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    //

    protected $fillable = [
    'nome',
	'cores',
	'acronimo',
	'insignia',
	'telefone',
	'email',
	'site',
	'apa_id',
	'localizacao_id'
];
}
