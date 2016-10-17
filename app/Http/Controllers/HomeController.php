<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Anuncio;

class HomeController extends Controller
{
   
    public function getIndex()
    {   
        $anuncios = Anuncio::orderBy('created_at','desc')->take(12)->get();
        $data['anuncios'] = $anuncios;
        $data['cont'] = 1;
        return view('inicio', $data);
    }
}
