<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use App\Models\Imagem;
use App\Models\PagamentoAnuncio;
use App\Models\Denuncia;
use App\Models\Comentario;
use App\Models\Mensagem;

class UsuarioController extends Controller
{
   public function __construct()

    {
        $this->middleware('auth');        

    }

    public function getIndex()

    {

       $usuarios = User::orderBy('name', 'asc')->get();

        $data['usuarios'] = $usuarios;

        return view('admin.usuarios', $data);  

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
