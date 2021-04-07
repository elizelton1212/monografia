<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssociacaoUser extends Model
{
    //
    protected $fillable = [
    'user_id',
    'associacaos_id'

    ];
}
