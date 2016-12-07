<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NomeObrigatorioRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FormaDePagamento;

class FormaDePagamentoController extends Controller
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

        $formasdepagamento = FormaDePagamento::orderBy('updated_at', 'desc')->paginate("10");

        $data['formasdepagamento'] = $formasdepagamento;

        return view("admin.formasdepagamento", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        return view('admin.formpagamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(NomeObrigatorioRequest $request)
    {
        $pagamento = new FormaDePagamento();
        $pagamento->nome = $request->nome;
        $pagamento->save();
        session(['msg' => 'Forma de pagamento cadastrada!']);
        return redirect('/admin/pagamento');
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
        $data['pagamento'] = FormaDePagamento::find($id);
        $data['edit'] = true;
        return view('admin.formpagamento', $data);
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
        $pagamento = FormaDePagamento::find($id);
        $pagamento->nome = $request->nome;
        $pagamento->save();
        session(['msg' => 'Forma de pagamento editada!']);
        return redirect('/admin/pagamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function getDestroy($id)
    {
        $formaPagamento = FormaDePagamento::find($id);
     

        if($formaPagamento->paganuncio->count() != 0){
           session(['msg' => 'Esta forma de pagamento não pode ser excluída pois contém anúncios!']);
            return redirect('/admin/pagamento');
        }else{
            $formaPagamento->delete();
            session(['msg' => 'Forma de pagamento excluída!']);
            return redirect('/admin/pagamento');
        }
    }
}
