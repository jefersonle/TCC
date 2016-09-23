<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
     public function anuncios()
    {
        return $this->hasMany('App\Models\Anuncio');
    }

     public function categoriapai()
    {
        return $this->belongsTo('App\Models\Categoria', 'categoria_pai');
    }

}
