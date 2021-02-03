<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Federacao extends Model
{
    
    protected $fillable = [
        'nome',
        'sigla',
        'modalidade',
        'president',
        'telefone',
        'email',
        'imagem'
            ];
}
