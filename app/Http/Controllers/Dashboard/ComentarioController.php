<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comentario;

use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');        

    }
    
    public function getIndex()
    {
        return view('dashboard.comentarios');
    }

     public function getDestroy($id)
    {   

        $comentario = Comentario::find($id);

        if ($comentario->user_id == Auth::user()->id) {
           $comentario->delete();
           session(['msg' => 'Comentário excluido!']);
            return redirect('/dashboard/comentarios');
        }else{            
            return redirect('/dashboard/comentarios');
        }

        
      
    }
}
