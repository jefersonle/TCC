<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Anuncio;

use App\Models\Imagem;
use App\Models\Comentario;
use App\Models\PagamentoAnuncio;
use App\Models\Denuncia;


class AnuncioController extends Controller
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

        $anuncios = Anuncio::orderBy('updated_at', 'desc')->paginate("10");

        $data['anuncios'] = $anuncios;

        return view("admin.anuncios", $data);
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

        $anuncio = Anuncio::find($id);

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


        session(['msg' => 'Anúncio excluído!']);

        return redirect('/admin/anuncios');
    }
}
