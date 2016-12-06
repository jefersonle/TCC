<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MensagemRequest extends Request
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
            'para_user_id' => 'required|numeric',
            'msg' => 'required|min:10',                      
        ];
    }

    public function messages()
    {
        return [
            'para_user_id.required' => 'O campo para é obrigatório.', 
            'para_user_id.required' => 'Erro ao selecionar destinatário.', 
            'msg.required' => 'O campo mensagem é obrigatório.',
            'msg.min' => 'O campo mensagem deve conter no mínimo 10 caracteres.',          
        ];
    }
}
