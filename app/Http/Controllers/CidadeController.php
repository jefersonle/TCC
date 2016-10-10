<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cidade;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request, $id)
    {
        
        if($request->ajax()){
               
                $cidades = Cidade::where('estado_id', $id)->orderBy('nome')->get();

                $cidades = $cidades->toArray();

                return $cidades;
        }        
        $cidades = Cidade::orderBy('nome')->get();
        dd($cidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tipo'] = 'criar';
        // return view('formcidade', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade();
        $cidade->estado_id = $request->estado_id;
        $cidade->nome = $request->nome;
        $cidade->ddd = $request->ddd;
        $cidade->save();

        return redirect('/cidade');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $cidade = Cidade::find($id);
        dd($cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $data['cidade'] = $cidade;
        $data['tipo'] = 'editar';
        // return view('formcidade', $data);
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
        $cidade = Cidade::find($id);
        $cidade->estado_id = $request->estado_id;
        $cidade->nome = $request->nome;
        $cidade->ddd = $request->ddd;
        $cidade->save();

        return redirect('/cidade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade = Cidade::find($id);
        $cidade->delete();

        return redirect('/cidade');
    }
}
