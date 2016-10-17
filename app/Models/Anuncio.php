<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Anuncio extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');        
    }

    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }

    public function imagens()
    {
        return $this->hasMany('App\Models\Imagem');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade');
    }    

}
