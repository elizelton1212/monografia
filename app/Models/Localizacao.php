<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    //
protected $fillable = [
    'provincia',
    'municipio',
    'districto',
    'bairro',
    'rua',
    'numero_da_casa'


];
 // Função que representa a relação entre a Localização e as Apas no Caso 1 para 1
public function apa(Type $var = null)
{
    # code...

    return $this->hasOne(\App\Apa);
}

}
