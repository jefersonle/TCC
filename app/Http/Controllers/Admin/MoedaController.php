<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MoedaRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Moeda;

class MoedaController extends Controller
{
   public function __construct()

    {
        $this->middleware('auth');
        $this->middleware('isAdmin');          

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        $moedas = Moeda::orderBy('updated_at', 'desc')->paginate("10");

        $data['moedas'] = $moedas;

        return view("admin.moedas", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        
        return view('admin.formmoeda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(MoedaRequest $request)
    {
        $moeda = new Moeda();
        $moeda->nome = $request->nome;
        $moeda->sigla = $request->sigla;
        $moeda->cifra = $request->cifra;
        $moeda->save();
        session(['msg' => 'Moeda cadastrada!']);
        return redirect('/admin/moedas');
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
    public function getEdit($id)
    {
        $data['moeda'] = Moeda::find($id);
        $data['edit'] = true;
        return view('admin.formmoeda', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(MoedaRequest $request, $id)
    {
        $moeda = Moeda::find($id);
        $moeda->nome = $request->nome;
        $moeda->sigla = $request->sigla;
        $moeda->cifra = $request->cifra;
        $moeda->save();
        session(['msg' => 'Moeda editada!']);
        return redirect('/admin/moedas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $moeda = Moeda::find($id);
        
        if($moeda->anuncios->count() != 0){
           session(['msg' => 'Esta moeda não pode ser excluída pois contém anúncios!']);
            return redirect('/admin/moedas');
        }else{
            $moeda->delete();
            session(['msg' => 'Moeda excluída!']);
            return redirect('/admin/moedas');
        }
    }
}
