<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function anuncio()
    {
        return $this->belongsTo('App\Models\Anuncio');
    }

}
