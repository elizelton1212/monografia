<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apa extends Model
{
    //

  // Aqui esta a definir quais são os campos que poderão receber os dados apartir do utilizador  
    protected $fillable=[
        
        'nome',
        'email',
        'telefone',
        'localizacao_id'
    ];

// Função que representa a relação entre a Apa e as Localizações  no Caso 1 para 1
    public function localizacao()
    {
        # code...
        $this->hasOne(\App\Localizacao::class);
    }
}
