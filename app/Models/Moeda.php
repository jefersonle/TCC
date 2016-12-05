<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moeda extends Model
{
    public function anuncios()
    {
        return $this->hasMany('App\Models\Anuncio');
    }
}
