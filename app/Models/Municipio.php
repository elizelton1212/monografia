<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
      public function MunicipioDistricto()
    {
    	# code...

    	return $this->hasMany('App\Models\Districto');
    }


public function MunicipioComuna(){
		# code...

    	return $this->hasMany('App\Models\Comuna');

}


}
