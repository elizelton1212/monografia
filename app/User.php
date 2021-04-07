<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Apa;
Use App\Models\UserAssociacao;
Use App\Models\Localizacao;
Use App\Models\Provincia;


class User extends Authenticatable
{

    private $t;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','imagem', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        public function role()
    {
        return $this->belongsToMany(\App\Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        # code...
        return $this->hasAnyRole($permission->roles);
    }

    public function hasAnyRole($roles)
    {
        # code...
        if (is_array($roles)|| is_object($roles)){

           return !! $roles->intersect($this->role)->count();
            }
            return $this->role->contains('name', $roles);
    }


    public function adminlte_image()
    {
        # code...

        return auth()->user()->imagem;
    }


    public function adminlte_profile_url()
    {
        # code...
    }

    public function adminlte_desc()
    {
        return auth()->user()->email;
    }

    public function apa()
    {
        $r = UserAssociacao::where('user_id',auth()->user()->id)->get();   
        foreach ($r as $value) {
            # code...

            $this->t = $value->associacaos_id;
        }
 $apa = Apa::find($this->t);

        $localizacao = $apa->localizacao_id;

        $id_provincia= Localizacao::find($localizacao)->provincia_id;
        $provincia= Provincia::find($id_provincia);

        return $provincia->nome;
    }
}
