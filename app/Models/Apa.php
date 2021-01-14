<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apa extends Model
{
    //


    protected $fillable = [
		'nome',
		'email',
		'telefone',
		'facebook',
		'responsavel',
		'localizacao_id'


    ];
}
