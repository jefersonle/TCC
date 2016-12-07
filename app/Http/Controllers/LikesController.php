<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Anuncio;


use App\Models\Denuncia;

use App\Models\Likes;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postGostei(Request $request)
    {
        $like = Likes::where('anuncio_id', $request->anuncio_id)->where('user_id', $request->user_id)->where('tipo', 1)->first();

        if($like){
            return "Voce já havia clicado em gostei neste anúncio antes!";
        }else{

            $like = new Likes();
            $like->tipo = 1;
            $like->user_id = $request->user_id;
            $like->anuncio_id = $request->anuncio_id;
            $like->save();

            $anuncio = Anuncio::find($request->anuncio_id);

            $anuncio->gostei = $anuncio->gostei + 1;

            $anuncio->save();

            return "Seu gostei foi adicionado ao anúncio!";
        }
    }

    public function postNaogostei(Request $request)
    {
        $like = Likes::where('anuncio_id', $request->anuncio_id)->where('user_id', $request->user_id)->where('tipo', 0)->first();

        if($like){
            return "Voce já havia clicado em não gostei neste anúncio antes!";
        }else{

            $like = new Likes();
            $like->tipo = 0;
            $like->user_id = $request->user_id;
            $like->anuncio_id = $request->anuncio_id;
            $like->save();
            
            $anuncio = Anuncio::find($request->anuncio_id);

            $anuncio->nao_gostei = $anuncio->nao_gostei + 1;

            $anuncio->save();

           return "Seu não gostei foi adicionado ao anúncio!";
        }
    }

    public function postDenunciar(Request $request)
    {
        $busca = Denuncia::where('anuncio_id', $request->anuncio_id)->get();

        if($busca->count()){
            return "Este anúncio já está sendo analisado pelo suporte. Obrigado!";
        }else{
            $denuncia = new Denuncia();

            $denuncia->anuncio_id = $request->anuncio_id;

            $denuncia->save();

            return "Sua denúncia para este anúncio foi recebida com sucesso e será analisada pela equipe de suporte. Obrigado!";
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
