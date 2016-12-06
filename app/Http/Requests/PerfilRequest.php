<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerfilRequest extends Request
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
            'email' => 'required|email',
            'senha' => 'min:8|max:255|confirmed',
            'cpf' => 'min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',            
            'senha.confirmed' => 'As senhas não coincidem.',
            'senha.min' => 'A senha deve conter no mínimo 8 dígitos.',
            'cpf.min' => 'O CPF deve conter no mínimo 11 dígitos.',
            'cpf.max' => 'O CPF deve conter no máximo 11 dígitos.',

        ];
    }
}
