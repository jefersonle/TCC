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
    public function denuncias()
    {
        return $this->hasMany('App\Models\Denuncia');
    }
    public function formaspagamento()
    {
        return $this->hasMany('App\Models\PagamentoAnuncio');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade');
    }      

    public function pagamentos()
    {
        return $this->belongsToMany('App\Models\FormaDePagamento', 'pagamento_anuncios');
    }

    public function formadeentrega()
    {
        return $this->belongsTo('App\Models\FormaDeEntrega', 'forma_de_entrega_id');
    }


}
