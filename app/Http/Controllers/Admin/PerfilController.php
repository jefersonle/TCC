<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Estado;

use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');        

    }

    public function getIndex()

    {
        $data["estados"] = Estado::all();
        $data["user"] = User::find(1);
       return view('admin.perfil', $data);  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(PerfilRequest $request)
    {
            $usuario = User::find(Auth::id());

            $usuario->name = $request->nome;
            $usuario->email = $request->email;
            if($request->senha !== "" && $request->senha !== null && $request->senha !== " "){
                $usuario->password = bcrypt($request->senha);
            }
            $usuario->cpf = $request->cpf;
            $usuario->contato_fone = $request->telefone;
            $usuario->contato_facebook = $request->facebook;
            $usuario->contato_whatsapp = $request->whatsapp;
            $usuario->cep = $request->cep;
            $usuario->cidade_id = $request->cidade_id;
            $usuario->logradouro = $request->logradouro;
            $usuario->numero = $request->numero;
            $usuario->complemento = $request->complemento;
            $usuario->bairro = $request->bairro;

            $usuario->save();

            session(['msg' => 'Perfil Salvo!']);

            return redirect('/admin/perfil');
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
    public function destroy($id)
    {
        //
    }
}
