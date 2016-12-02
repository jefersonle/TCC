<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Cidade;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $estados = Estado::orderBy('nome')->get();        

        if($request->ajax()){

                $estados = $estados->toArray();

                return $estados;
        }
        
        dd($estados);
    }

    public function getBusca(Request $request)
    {
        $cidades = Cidade::where('nome', 'LIKE', $request->term.'%')->orderBy('nome', 'ASC')->get();

        foreach ($cidades as $cidade) {
            $cidadeLabel = $cidade->nome."(".$cidade->estado->nome.")";

            $cidadeJson[] = [
                "value" => $cidade->id,
                "label"=> $cidadeLabel,
                "desc"=> "Produtos na Cidade de ".$cidade->nome,
                "tipo"=> "cidade"
            ];         

            $regiaoLabel = $cidade->nome."(".$cidade->estado->nome.") e Região (".$cidade->ddd.")";

            $cidadeJson[] = [
                "value" => $cidade->ddd,
                "label"=> $regiaoLabel,
                "desc"=>"Produtos na região de ".$cidade->nome."(".$cidade->ddd.")",
                "tipo"=> "regiao"
            ];    
        }

        if($request->ajax()){                

                return $cidadeJson;
        }
        
        dd($estados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tipo'] = 'criar';
        // return view('formestado', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado();
        $estado->nome = $request->nome;
        $estado->uf = $request->uf;
        $estado->save();

        return redirect('/estado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $estado = Estado::find($id);
        dd($estado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);
        $data['estado'] = $estado;
        $data['tipo'] = 'editar';
        // return view('formestado', $data);
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
        $estado = Estado::find($id);
        $estado->nome = $request->nome;
        $estado->uf = $request->uf;
        $estado->save();

        return redirect('/estado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->delete();

        return redirect('/estado');
    }
}
