<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaDePagamento extends Model
{
   	public function paganuncio()
    {
        return $this->hasMany('App\Models\PagamentoAnuncio');
    }
}
