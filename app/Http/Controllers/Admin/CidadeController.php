<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cidade;

class CidadeController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');        

    }

    public function getIndex()

    {
        $cidades = Cidade::orderBy('nome', 'asc')->get();

        $data['cidades'] = $cidades;

        return view('admin.cidades', $data);  
       

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
