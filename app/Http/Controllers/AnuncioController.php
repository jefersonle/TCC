<?php







namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;



use App\Http\Controllers\Controller;



use App\Models\Anuncio;



use App\Models\Estado;

use App\Models\Imagem;







class AnuncioController extends Controller



{



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */



    public function __construct()



    {



        $this->middleware('auth', ['only' => ['getCreate', 'postCreate', 'getEdit', 'postUpdate', 'getDestroy']]);



        



    }



    public function getIndex()



    {



        $anuncios = Anuncio::orderBy('updated_at', 'desc')->get();



        $data['anuncios'] = $anuncios;



        $data['bread'] = "Todos os anúncios";



        return view('anuncio', $data);



    }







    



    public function getCreate()



    {



        $data['tipo'] = 'criar';



        return view('formanuncio', $data);







    }







    



    public function postCreate(Request $request)



    {   



        $anuncio = new Anuncio();



        $anuncio->cidade_id = $request->cidade_id;



        $anuncio->user_id = \Auth::user()->id;



        $anuncio->categoria_id = $request->categoria_id;



        $anuncio->titulo = $request->titulo;



        $anuncio->descricao = $request->descricao;



        $valor = str_replace("," , "" , $request->valor);



        $valor = str_replace("." , "" , $valor);



        $anuncio->valor = $valor;



        $anuncio->save();



        $path = "uploads";

        

        if ($request->hasFile('images')) {  

            $files = $request->files;         

            foreach($files as $images){              

                foreach ($images as $image) {

                    $name = $image->getClientOriginalName();

                    $name = microtime() . "_" . $name;

                    $image->move($path, $name);



                    $imagem = new Imagem();

                    $imagem->anuncio_id = $anuncio->id;

                    $imagem->nome = $name;

                    $imagem->save();



                }

            }

               

        }        



        

        $data['tipo'] = 'criar';

        $data['success'] = true;



        return view('formanuncio', $data);





    }







    



    public function getShow($id)



    {



        $anuncio = Anuncio::find($id);



        $data['anuncio'] = $anuncio;



        return view('single', $data);



    }







    



    public function getEdit($id)



    {



        $anuncio = Anuncio::find($id);



        $data['anuncio'] = $anuncio;



        $data['tipo'] = 'editar';



        return view('formanuncio', $data);







    }







   



    public function postEdit(Request $request, $id)



    {



        $anuncio = Anuncio::find($id);



        if (\Auth::user()->id == $anuncio->user_id){

           

            $anuncio->cidade_id = $request->cidade_id;



            $anuncio->user_id = \Auth::user()->id;



            $anuncio->categoria_id = $request->categoria_id;



            $anuncio->titulo = $request->titulo;



            $anuncio->descricao = $request->descricao;



            $anuncio->valor = $request->valor;



            $anuncio->save();

            

            $path = "uploads";

        

            if ($request->hasFile('images')) {  

                $files = $request->files;         

                foreach($files as $images){              

                    foreach ($images as $image) {

                        $name = $image->getClientOriginalName();

                        $name = microtime() . "_" . $name;

                        $image->move($path, $name);

    

                        $imagem = new Imagem();

                        $imagem->anuncio_id = $anuncio->id;

                        $imagem->nome = $name;

                        $imagem->save();

    

                    }

                }



        }     



        $data['anuncio'] = $anuncio;

        $data['tipo'] = 'editar';

        $data['success'] = true;



        return view('formanuncio', $data);



    }

    }







    



    public function getDestroy($id)



    {



        $anuncio = Anuncio::find($id);



        if (\Auth::user()->id == $anuncio->user_id){

           

            $anuncio->delete();

        }     



        return redirect('/dashboard/anuncio');

    }







     public function getCidade($id)



    {



        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('updated_at', 'desc')->get();



        $data['anuncios'] = $anuncios;



        $data['bread'] = $anuncios[0]->cidade->nome;



        return view('anuncio', $data);        



    }







    public function getEstado($id)



    {



        $anuncios = Estado::find($id)->anuncios()->get();        



        $data['anuncios'] = $anuncios;



        $data['bread'] = $anuncios[0]->cidade->estado->nome;



        return view('anuncio', $data);



        



    }







    public function getCategoria($id)



    {



        $anuncios = Anuncio::where('categoria_id', $id)->orderBy('updated_at', 'desc')->get();        



        $data['anuncios'] = $anuncios;



        $data['bread'] = $anuncios[0]->categoria->nome;



        return view('anuncio', $data);



        



    }



}



