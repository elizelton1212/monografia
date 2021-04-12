<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    //
	protected $fillable = [

				'nome',
				'dataNascimento',
				'categoria',
				'posicao',
				'nacionalidade',
				'localizacao_id',
				'licenca_id'





	];



	public function Licenca()
	{
		
		return $this->hasOne('App\Models\Licenca');
	}


}
