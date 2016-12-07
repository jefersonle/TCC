<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\PerfilRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use App\Models\Imagem;
use App\Models\PagamentoAnuncio;
use App\Models\Denuncia;
use App\Models\Comentario;
use App\Models\Mensagem;
use App\Models\Estado;

class UsuarioController extends Controller
{
   public function __construct()

    {
        $this->middleware('auth'); 
        $this->middleware('isAdmin');         

    }

    public function getIndex()

    {

       $usuarios = User::orderBy('name', 'asc')->paginate("10");

        $data['usuarios'] = $usuarios;

        return view('admin.usuarios', $data);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        $data["estados"] = Estado::all();

        return view('admin.formusuario', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CreateUserRequest $request)
    {
            $usuario = new User();
            $usuario->name = $request->nome;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->senha);
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

            session(['msg' => 'Usuário cadastrado!']);

            return redirect('/admin/usuarios');

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
        $data['usuario'] = User::find($id);
        $data['edit'] = true;
        $data['estados'] = Estado::all();
        return view('admin.formusuario', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(PerfilRequest $request, $id)
    {
            $usuario = User::find($id);
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

            session(['msg' => 'Usuário editado!']);

            return redirect('/admin/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)

    {

        $user = User::find($id);

        foreach ($user->anuncios as $anuncio) {
            foreach ($anuncio->imagens as $imagem) {
                $imagem = Imagem::find($imagem->id);

                $file = "uploads/".$imagem->nome;

                if(file_exists($file)){
                    unlink($file);
                }   

                $imagem->delete();
            }

            foreach ($anuncio->comentarios as $comentario) {
                $comentario = Comentario::destroy($comentario->id);
            }
            foreach ($anuncio->formaspagamento as $pagamento) {
                $pagamento = PagamentoAnuncio::destroy($pagamento->id);
            }

            foreach ($anuncio->denuncias as $denuncia) {
                $denuncia = Denuncia::destroy($denuncia->id);
            }

            $anuncio->delete();
        }

        foreach ($user->comentarios as $comentario) {
            $comentario = Comentario::destroy($comentario->id);
        }

        foreach ($user->comentarios as $comentario) {
            $comentario = Comentario::destroy($comentario->id);
        }

        foreach ($user->mensagensenviadas as $enviada) {
            $mensagem = Mensagem::destroy($enviada->id);
        }

        foreach ($user->mensagensrecebidas as $recebida) {
            $mensagem = Mensagem::destroy($recebida->id);
        }

        $user->delete();


        session(['msg' => 'Usuário excluído!']);

        return redirect('/admin/usuarios');
    }
}
