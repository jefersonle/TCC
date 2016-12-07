<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NomeObrigatorioRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Status;

class StatusController extends Controller
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

        $statuslist = Status::orderBy('updated_at', 'desc')->paginate("10");

        $data['statuslist'] = $statuslist;

        return view("admin.statuslist", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        
        return view('admin.formstatus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(NomeObrigatorioRequest $request)
    {
        $status = new Status();
        $status->nome = $request->nome;
        $status->save();
        session(['msg' => 'Status cadastrado!']);
        return redirect('/admin/statuslist');

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
        $data['status'] = Status::find($id);
        $data['edit'] = true;
        return view('admin.formstatus', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(NomeObrigatorioRequest $request, $id)
    {
        $status = Status::find($id);
        $status->nome = $request->nome;
        $status->save();
        session(['msg' => 'Status editado!']);
        return redirect('/admin/statuslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $status = Status::find($id);
        
        if($status->anuncios->count() != 0){
           session(['msg' => 'Este status não pode ser excluído pois contém anúncios!']);
            return redirect('/admin/statuslist');
        }else{
            $status->delete();
            session(['msg' => 'Status excluído!']);
            return redirect('/admin/statuslist');
        }
    }
}
