<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //




     public function ProvinciaMunicipio()
    {
    	# code...

    	return $this->hasMany('App\Models\Municipio');
    }
}
