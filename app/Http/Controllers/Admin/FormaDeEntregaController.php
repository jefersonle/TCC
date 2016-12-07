<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NomeObrigatorioRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FormaDeEntrega;

class FormaDeEntregaController extends Controller
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

        $formasdeentrega = FormaDeEntrega::orderBy('updated_at', 'desc')->paginate("10");

        $data['formasdeentrega'] = $formasdeentrega;

        return view("admin.formasdeentrega", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {           
        return view('admin.formentrega');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(NomeObrigatorioRequest $request)
    {
        $entrega = new FormaDeEntrega();
        $entrega->nome = $request->nome;
        $entrega->save();
        session(['msg' => 'Forma de entrega cadastrada!']);
        return redirect('/admin/entrega');
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
        $data['entrega'] = FormaDeEntrega::find($id);
        $data['edit'] = true;
        return view('admin.formentrega', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(NomeObrigatorioRequest $request, $id)
    {
        $entrega = FormaDeEntrega::find($id);
        $entrega->nome = $request->nome;
        $entrega->save();
        session(['msg' => 'Forma de entrega editada!']);
        return redirect('/admin/entrega');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $formaEntrega = FormaDeEntrega::find($id);
     
        if($formaEntrega->anuncios->count() != 0){
           session(['msg' => 'Esta forma de entrega não pode ser excluída pois contém anúncios!']);
            return redirect('/admin/entrega');
        }else{
            $formaEntrega->delete();
            session(['msg' => 'Forma de entrega excluída!']);
            return redirect('/admin/entrega');
        }
    }
}
