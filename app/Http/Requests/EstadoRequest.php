<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EstadoRequest extends Request
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
            'uf' => 'required|max:2|min:2|alpha',                      
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.', 
            'uf.required' => 'O campo UF é obrigatório.',   
            'uf.min' => 'O campo UF deve conter dois caracteres.',   
            'uf.max' => 'O campo UF deve conter dois caracteres.', 
            'uf.alpha' => 'O campo UF deve conter apenas letras.',          
        ];
    }
}
