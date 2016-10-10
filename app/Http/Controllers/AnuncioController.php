<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Anuncio;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $anuncios = Anuncio::all();

        dd($anuncios);
    }

    
    public function getCreate()
    {
        $data['tipo'] = 'criar';
        return view('formanuncio', $data);

    }

    
    public function postCreate(Request $request)
    {
        $anuncio = new Anuncio();
        $anuncio->cidade_id = $request->cidade_id;
        $anuncio->user_id = 1;
        $anuncio->categoria_id = $request->categoria_id;
        $anuncio->titulo = $request->titulo;
        $anuncio->descricao = $request->descricao;
        $anuncio->valor = $request->valor;
        $anuncio->save();

        return redirect('/anuncio/create'); 

    }

    
    public function getShow($id)
    {
        $anuncio = Anuncio::find($id);

        dd($anuncio);
    }

    
    public function edit($id)
    {
        $anuncio = Anuncio::find($id);
        $data['anuncio'] = $anuncio;
        $data['tipo'] = 'editar';
        // return view('formanuncio', $data);

    }

   
    public function update(Request $request, $id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio->cidade_id = $request->cidade_id;
        $anuncio->user_id = $request->user_id;
        $anuncio->categoria_id = $request->categoria_id;
        $anuncio->titulo = $request->titulo;
        $anuncio->descricao = $request->descricao;
        $anuncio->valor = $request->valor;
        $anuncio->save();

        return redirect('/anuncio');   
    }

    
    public function getDestroy($id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio->delete();

        return redirect('/anuncio');
    }
}
