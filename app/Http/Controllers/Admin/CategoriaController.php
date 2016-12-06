<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NomeObrigatorioRequest;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');        

    }

    public function getIndex()

    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();


        $data['categorias'] = $categorias;

        return view('admin.categorias', $data);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        $data['categorias'] = Categoria::all();
        return view('admin.formcategoria', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(NomeObrigatorioRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        if(isset($request->categoria_id) && $request->categoria_id !=""){
            if($categoriaPai = Categoria::find($request->categoria_id)){
                $categoria->categoria_id = $request->categoria_id;
            }
        }
        
        $categoria->save();

        session(['msg' => 'Categoria cadastrada!']);
        return redirect('/admin/categorias');

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
        $categoria = Categoria::find($id);

        if($categoria->anuncios->count() != 0){
           session(['msg' => 'Esta categoria não pode ser excluída pois contém anúncios!']);
            return redirect('/admin/categorias');

        }else{
            $categoria->delete();
            session(['msg' => 'Categoria excluída!']);
            return redirect('/admin/categorias');
        }
    }
}
