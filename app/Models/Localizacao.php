<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    //
protected $fillable = [

	'provincia_id',
	'municipio_id',
	'districto_id',
	'comuna_id',
	'bairro',
	'rua',
	'ncasa'

];


}
