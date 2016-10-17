<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Anuncio;
use App\Models\Estado;

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
        $data['anuncios'] = $anuncios;
        return view('anuncio', $data);
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
        $data['anuncio'] = $anuncio;
        return view('single', $data);
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

     public function getCidade($id)
    {
        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('created_at')->get();
        $data['anuncios'] = $anuncios;
        return view('anuncio', $data);
        
    }

    public function getEstado($id)
    {
        $anuncios = Estado::find($id)->anuncios()->get();        
        $data['anuncios'] = $anuncios;
        return view('anuncio', $data);
        
    }

    public function getCategoria($id)
    {
        $anuncios = Anuncio::where('categoria_id', $id)->get();        
        $data['anuncios'] = $anuncios;
        return view('anuncio', $data);
        
    }
}
