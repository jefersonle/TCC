<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    public function anuncio()
    {
        return $this->belongsTo('App\Models\Anuncio');
    }
}
