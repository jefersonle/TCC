<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    public function de()
    {
        return $this->belongsTo('App\User', 'de_user_id');
    }

    public function para()
    {
        return $this->belongsTo('App\User', 'para_user_id');
    }

    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }
}
