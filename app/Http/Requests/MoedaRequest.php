<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MoedaRequest extends Request
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
            'sigla' => 'required|max:3|alpha', 
            'cifra' => 'required',                 
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.', 
            'sigla.required' => 'O campo sigla é obrigatório.', 
            'sigla.max' => 'O campo sigla deve conter apenas 3 caracteres.',
            'sigla.alpha' => 'O campo sigla deve conter apenas letras.',     
            'cifra.required' => 'O campo cifra é obrigatório.', 
            
        ];
    }
}
