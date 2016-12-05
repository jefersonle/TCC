<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FormaDePagamento;

class FormaDePagamentoController extends Controller
{
     public function __construct()

    {
        $this->middleware('auth');        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        $formasdepagamento = FormaDePagamento::orderBy('updated_at', 'desc')->get();

        $data['formasdepagamento'] = $formasdepagamento;

        return view("admin.formasdepagamento", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
