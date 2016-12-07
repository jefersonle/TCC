<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cidade;
use App\Models\Estado;

class CidadeController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');     
        $this->middleware('isAdmin');     

    }

    public function getIndex()

    {
        $cidades = Cidade::orderBy('nome', 'asc')->paginate("10");

        $data['cidades'] = $cidades;

        return view('admin.cidades', $data);  
       

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        $data['estados'] = Estado::all();
        return view('admin.formcidade', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CidadeRequest $request)
    {
        $cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->ddd = $request->ddd;
        $cidade->estado_id = $request->estado_id;
        $cidade->save();

        session(['msg' => 'Cidade cadastrada!']);
        return redirect('/admin/cidades');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $data['cidade'] = Cidade::find($id);
        $data['edit'] = true;
        $data['estados'] = Estado::all();
        return view('admin.formcidade', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->nome = $request->nome;
        $cidade->ddd = $request->ddd;
        $cidade->estado_id = $request->estado_id;
        $cidade->save();

        session(['msg' => 'Cidade editada!']);
        return redirect('/admin/cidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getDestroy($id)
    {
        $cidade = Cidade::find($id);

        if($cidade->anuncios->count() != 0){
           session(['msg' => 'Esta cidade não pode ser excluída pois contém anúncios!']);
            return redirect('/admin/cidades');

        }else{
            $cidade->delete();
            session(['msg' => 'Cidade excluída!']);
            return redirect('/admin/cidades');
        }
    }
}
