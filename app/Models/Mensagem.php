<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    public function de()
    {
        return $this->hasOne('App\Usuario', 'de');
    }

    public function para()
    {
        return $this->hasOne('App\Usuario', 'para');
    }

    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }
}
