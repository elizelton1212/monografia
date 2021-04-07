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
		'localizacao_id',
		'federacao_id',


    ];



    public function Federacao()
    {
    	# code...

    	return $this->belongsTo('App\Models\Federacao');
    }

    public function Localizacao()
    {
    return $this->hasOne('App\Models\Localizacao');
    }

    public function Clubes($value='')
    {
        # code...

        return $this->hasMany('App\Models\Clube');
    }
}
