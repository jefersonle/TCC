<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MensagemRequest;
use App\Http\Controllers\Controller;

use App\Models\Mensagem;
use App\User;

use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    
    public function __construct()

    {
        $this->middleware('auth');        

    }

    public function getIndex()
    {
        return view('dashboard/mensagens');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate($id= null)
    {           
        if(isset($id) && $id !="" && $id != 0 && $id != null){
            $data['respostapara'] = Mensagem::find($id);
        }
        $data['usuarios'] = User::all();
        return view('dashboard.formmensagem', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(MensagemRequest $request)
    {
        $mensagem = new Mensagem();
        $mensagem->para_user_id = $request->para_user_id;
        $mensagem->de_user_id = Auth::id();
        $mensagem->msg = $request->msg;
        $mensagem->save();

        session(['msg' => 'Mensagem enviada!']);
        return redirect('/dashboard/mensagens');

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
        $mensagem = Mensagem::find($id);

        if($mensagem->de_user_id == Auth::user()->id){
            $mensagem->delete();
            session(['msg' => 'Mensagem excluída!']);
            return redirect('/dashboard/mensagens');
        }else{
             session(['msg' => 'Somente o autor pode excluir a mensagem!']);
            return redirect('/dashboard/mensagens');
        }

        
    }
}
