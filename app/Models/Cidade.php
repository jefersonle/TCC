<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
     public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
    public function anuncios()
    {
        return $this->hasMany('App\Models\Anuncio');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
