<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function anuncios()
    {
        return $this->hasMany('App\Models\Anuncio');
    }
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }

    public function mensagensenviadas()
    {
        return $this->hasMany('App\Models\Mensagem', 'de_user_id');
    }

     public function mensagensrecebidas()
    {
        return $this->hasMany('App\Models\Mensagem', 'para_user_id');
    }

}
