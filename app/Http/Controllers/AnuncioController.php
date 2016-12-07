<?php







namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;

use App\Http\Requests\AnuncioRequest;


use App\Http\Controllers\Controller;



use App\Models\Anuncio;



use App\Models\Estado;

use App\Models\Cidade;

use App\Models\Imagem;

use App\Models\Moeda;

use App\Models\FormaDePagamento;

use App\Models\FormaDeEntrega;

use App\Models\PagamentoAnuncio;


use App\Models\Comentario;

use App\Models\Denuncia;







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



    public function getIndex(Request $request)



    {
        $teste = Anuncio::orderBy('updated_at', 'desc')->first();

        if($teste != null){            

            if(isset($request->f)){
                switch ($request->f) {
                    case 'antigo':
                        $anuncios = Anuncio::orderBy('updated_at', 'ASC')->get();
                        break;
                    case 'recente':
                       $anuncios = Anuncio::orderBy('updated_at', 'DESC')->get();
                        break;
                    case 'menorpreco':
                       $anuncios = Anuncio::orderBy('valor', 'ASC')->get();
                        break;
                    case 'maiorpreco':
                        $anuncios = Anuncio::orderBy('valor', 'DESC')->get();
                        break;  
                    case 'top':
                        $anuncios = Anuncio::orderBy('gostei', 'DESC')->get();
                        break;                
                }
             }else{
                $anuncios = Anuncio::orderBy('updated_at', 'desc')->get();
             }

        }else{
            $anuncios = array();
        }    


        $data['anuncios'] = $anuncios;


        $data['bread1'] = "Categorias";

        $data['bread1a'] = "categoria";          

        $data['bread2'] = "Todos os anúncios";


        return view('anuncio', $data); 

    }

  



    public function getCreate()

    {



        $data['tipo'] = 'criar';

        $data['moedas'] = Moeda::all();

        $data['formasDeEntrega'] = FormaDeEntrega::all();

        $data['formasDePagamento'] = FormaDePagamento::all();

        return view('formanuncio', $data);


    }



    public function postCreate(AnuncioRequest $request)



    {   
        
        $anuncio = new Anuncio();



        $anuncio->cidade_id = $request->cidade_id;

        //Pega cidade para salvar seu ddd no anuncio
        $cidade = Cidade::find($request->cidade_id);

        $anuncio->ddd = $cidade->ddd;

        $anuncio->user_id = \Auth::user()->id;



        $anuncio->categoria_id = $request->categoria_id;



        $anuncio->titulo = $request->titulo;



        $anuncio->descricao = $request->descricao;



        $valor = str_replace("," , "" , $request->valor);



        $valor = str_replace("." , "" , $valor);



        $anuncio->valor = $valor;

        $anuncio->status_id = 1;

        $anuncio->moeda_id = $request->moeda;

        $anuncio->forma_de_entrega_id = $request->entrega;

        $anuncio->condicao = $request->condicao;

        $anuncio->contato_email = ($request->email != null)?1:0;
        $anuncio->contato_fone1 = ($request->telefone != null)?1:0;
        $anuncio->contato_whatsapp = ($request->whatsapp != null)?1:0;
        $anuncio->contato_facebook = ($request->facebook != null)?1:0;
        $anuncio->contato_mensagem = 1;

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

        foreach ($request->pagamento as $value) {
            $pagamentoAnuncio = new PagamentoAnuncio();
            $pagamentoAnuncio->anuncio_id = $anuncio->id;
            $pagamentoAnuncio->forma_de_pagamento_id = $value;
            $pagamentoAnuncio->save();
            
        }        

        $data['tipo'] = 'criar';

        $data['success'] = true;

        $data['moedas'] = Moeda::all();

        $data['formasDeEntrega'] = FormaDeEntrega::all();

        $data['formasDePagamento'] = FormaDePagamento::all();




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

        if (\Auth::user()->id == $anuncio->user_id || \Auth::user()->id == 1){            


            $data['moedas'] = Moeda::all();

            $data['formasDeEntrega'] = FormaDeEntrega::all();

            $data['formasDePagamento'] = FormaDePagamento::all();

            $data['anuncio'] = $anuncio;


            $data['tipo'] = 'editar';

            return view('formanuncio', $data);
        }else{
            return redirect('/dashboard/anuncio');
        }
        
    }







   



    public function postEdit(AnuncioRequest $request, $id)

    {



        $anuncio = Anuncio::find($id);



        if (\Auth::user()->id == $anuncio->user_id || \Auth::user()->id == 1){

           

            $anuncio->cidade_id = $request->cidade_id;

            //Pega cidade para salvar seu ddd no anuncio
            $cidade = Cidade::find($request->cidade_id);

            $anuncio->ddd = $cidade->ddd;

            $anuncio->user_id = \Auth::user()->id;



            $anuncio->categoria_id = $request->categoria_id;



            $anuncio->titulo = $request->titulo;



            $anuncio->descricao = $request->descricao;



            $valor = str_replace("," , "" , $request->valor);



            $valor = str_replace("." , "" , $valor);



            $anuncio->valor = $valor;

            $anuncio->status_id = 1;

            $anuncio->moeda_id = $request->moeda;

            $anuncio->forma_de_entrega_id = $request->entrega;

            $anuncio->condicao = $request->condicao;

            $anuncio->contato_email = ($request->email != null)?1:0;
            $anuncio->contato_fone1 = ($request->telefone != null)?1:0;
            $anuncio->contato_whatsapp = ($request->whatsapp != null)?1:0;
            $anuncio->contato_facebook = ($request->facebook != null)?1:0;
            $anuncio->contato_mensagem = 1;

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

            foreach ($anuncio->pagamentos as $pag) {
                    $teste = PagamentoAnuncio::where('anuncio_id', $anuncio->id)->first();
                    $teste->delete();
                    
            }

            foreach ($request->pagamento as $value) {
                $pagamentoAnuncio = new PagamentoAnuncio();
                $pagamentoAnuncio->anuncio_id = $anuncio->id;
                $pagamentoAnuncio->forma_de_pagamento_id = $value;
                $pagamentoAnuncio->save();                
            }   

        $data['anuncio'] = $anuncio;

        $data['tipo'] = 'editar';

        $data['success'] = true;

        $data['moedas'] = Moeda::all();

        $data['formasDeEntrega'] = FormaDeEntrega::all();

        $data['formasDePagamento'] = FormaDePagamento::all();



        return view('formanuncio', $data);



    }

    }







    



    public function getDestroy($id)



    {



        $anuncio = Anuncio::find($id);



        if (\Auth::user()->id == $anuncio->user_id){
           

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

                return redirect('/dashboard/anuncio');
            }



        return redirect('/dashboard/anuncio');

    }

     public function getCidade($id, Request $request)

    {

         $teste = Anuncio::where('cidade_id', $id)->orderBy('updated_at', 'desc')->first();

        if($teste != null){

            if(isset($request->f)){
                switch ($request->f) {
                    case 'antigo':
                        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('updated_at', 'ASC')->get();
                        break;
                    case 'recente':
                        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('updated_at', 'DESC')->get();
                        break;
                    case 'menorpreco':
                        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('valor', 'ASC')->get();
                        break;
                    case 'maiorpreco':
                        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('valor', 'DESC')->get();
                        break;      
                    case 'top':
                        $anuncios = Anuncio::where('cidade_id', $id)->orderBy('gostei', 'DESC')->get();
                        break;             
                }
                $data['bread2'] = $anuncios[0]->cidade->nome;
             }else{
                $anuncios = Anuncio::where('cidade_id', $id)->orderBy('updated_at', 'desc')->get();
             }
            

        }else{
            $anuncios = array();
        } 


        $data['anuncios'] = $anuncios;


        $data['bread1'] = "Cidade";
        $data['bread1a'] = "categoria";     
       
        



        return view('anuncio', $data);        



    }


    public function getRegiao($id, Request $request)



    {
        $teste = Anuncio::where('ddd', $id)->orderBy('updated_at', 'desc')->first();

        if($teste != null){

            if(isset($request->f)){
                switch ($request->f) {
                    case 'antigo':
                        $anuncios = Anuncio::where('ddd', $id)->orderBy('updated_at', 'ASC')->get();
                        break;
                    case 'recente':
                        $anuncios = Anuncio::where('ddd', $id)->orderBy('updated_at', 'DESC')->get();
                        break;
                    case 'menorpreco':
                        $anuncios = Anuncio::where('ddd', $id)->orderBy('valor', 'ASC')->get();
                        break;
                    case 'maiorpreco':
                        $anuncios = Anuncio::where('ddd', $id)->orderBy('valor', 'DESC')->get();
                        break;     
                    case 'top':
                        $anuncios = Anuncio::where('ddd', $id)->orderBy('gostei', 'DESC')->get();
                        break;             
                }
             }else{
                $anuncios = Anuncio::where('ddd', $id)->orderBy('updated_at', 'desc')->get();
             }


            $data['bread2'] = "Região com DDD ".$anuncios[0]->ddd; 

        }else{
            $anuncios = array();
        }


        $data['anuncios'] = $anuncios;

        $data['bread1'] = "Regiao";
        $data['bread1a'] = "categoria";
          

        return view('anuncio', $data);  

    }







    public function getEstado($id)



    {



        $anuncios = Estado::find($id)->anuncios()->get();        



        $data['anuncios'] = $anuncios;



        $data['bread'] = $anuncios[0]->cidade->estado->nome;



        return view('anuncio', $data);



        



    }







    public function getCategoria($id, Request $request)

    {
        $teste = Anuncio::where('categoria_id', $id)->orderBy('updated_at', 'desc')->first();
        
        if($teste !=null){
                if(isset($request->f)){
                    switch ($request->f) {
                        case 'antigo':
                            $anuncios = Anuncio::where('categoria_id', $id)->orderBy('updated_at', 'ASC')->get();
                            break;
                        case 'recente':
                            $anuncios = Anuncio::where('categoria_id', $id)->orderBy('updated_at', 'DESC')->get();
                            break;
                        case 'menorpreco':
                            $anuncios = Anuncio::where('categoria_id', $id)->orderBy('valor', 'ASC')->get();
                            break;
                        case 'maiorpreco':
                            $anuncios = Anuncio::where('categoria_id', $id)->orderBy('valor', 'DESC')->get();
                            break; 
                        case 'top':
                            $anuncios = Anuncio::where('categoria_id', $id)->orderBy('gostei', 'DESC')->get();
                            break;                 
                    }
                 }else{
                       $anuncios = Anuncio::where('categoria_id', $id)->orderBy('updated_at', 'desc')->get();            
                 }  

                 $data['bread2'] = $anuncios[0]->categoria->nome;
        }else{
            $anuncios = array();
        }

                       



        $data['anuncios'] = $anuncios;


        
        $data['bread1'] = "Categorias";
        $data['bread1a'] = "categoria";
               



        return view('anuncio', $data);



        



    }

    public function getBusca(Request $request)



    {

        if(isset($request->f)){
            switch ($request->f) {
                case 'antigo':
                    $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('updated_at', 'ASC')->get();
                    break;
                case 'recente':
                   $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('updated_at', 'DESC')->get();
                    break;
                case 'menorpreco':
                   $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('valor', 'ASC')->get();
                    break;
                case 'maiorpreco':
                    $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('valor', 'DESC')->get();
                    break;  
                case 'top':
                        $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('gostei', 'DESC')->get();
                        break;              
            }
         }else{
            $anuncios = Anuncio::where('titulo', 'LIKE', '%'.$request->keyword.'%')->orderBy('updated_at', 'desc')->get(); 
         }     


               



        $data['anuncios'] = $anuncios;


        $data['bread1'] = "Buscar";
        $data['bread1a'] = "";
        $data['bread2'] = $request->keyword;
       

        $data['keyword'] = $request->keyword;



        return view('anuncio', $data);     



    }

    public function getUsuario($id, Request $request)



    {
        $teste = Anuncio::where('user_id', $id)->orderBy('updated_at', 'desc')->first();

        if($teste != null){
            if(isset($request->f)){
                switch ($request->f) {
                    case 'antigo':
                        $anuncios = Anuncio::where('user_id', $id)->orderBy('updated_at', 'ASC')->get();
                        break;
                    case 'recente':
                        $anuncios = Anuncio::where('user_id', $id)->orderBy('updated_at', 'DESC')->get();
                        break;
                    case 'menorpreco':
                        $anuncios = Anuncio::where('user_id', $id)->orderBy('valor', 'ASC')->get();
                        break;
                    case 'maiorpreco':
                        $anuncios = Anuncio::where('user_id', $id)->orderBy('valor', 'DESC')->get();
                        break;
                    case 'top':
                        $anuncios = Anuncio::where('user_id', $id)->orderBy('gostei', 'DESC')->get();
                        break; 


                }
             }else{
                $anuncios = Anuncio::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
             }
             $data['bread2'] = $anuncios[0]->user->name;  
        }else{
            $anuncios = array();
        }     

        $data['anuncios'] = $anuncios;

        $data['bread1'] = "Usuário";
        $data['bread1a'] = "categoria";

        return view('anuncio', $data);


    }


}



