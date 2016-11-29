<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Mensagem;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $mensagens = Mensagem::all();
        dd($mensagens);
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
    public function postStore(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->de = $request->user_id;
        $mensagem->para = $request->vendedor_id;
        $mensagem->status_id = 0;
        $mensagem->msg = $request->mensagem;
        $mensagem->save();

        return "Mensagem enviada!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $mensagem = Mensagem::find($id);
        dd($mensagem);
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
        $mensagem = Mensagem::find($id);
        $mensagem->de = $request->de;
        $mensagem->para = $request->para;
        $mensagem->status_id = 0;
        $mensagem->msg = $request->msg;
        $mensagem->save();

        return redirect('/mensagem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensagem = Mensagem::find($id);
        $mensagem->delete();

        return redirect('/mensagem');
    }
}
