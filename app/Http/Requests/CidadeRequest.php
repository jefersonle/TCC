<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CidadeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function authorize()
    {
       return \Auth::check();
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255', 
            'ddd' => 'required|numeric', 
            'estado_id' => 'required|max:255|numeric',                      
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',  
            'ddd.required' => 'O campo DDD é obrigatório.',                    
            'ddd.numeric' => 'O campo DDD deve conter dois números.',  
            'estado_id.required' => 'O campo estado é obrigatório.',  
            'estado_id.numeric' => 'Erro ao selecionar o estado.',         
        ];
    }
}
