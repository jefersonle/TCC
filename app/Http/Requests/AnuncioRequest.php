<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnuncioRequest extends Request
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
            'categoria_id' => 'required|numeric', 
            'titulo' => 'required|min:3', 
            'descricao' => 'required|min:25', 
            'estado_id' => 'required|max:255|numeric',
            'cidade_id' => 'required|numeric', 
            'valor' => 'required|max:255',  
            'moeda' => 'required|max:255|numeric',
            'condicao' => 'required|max:255|alpha',
            'entrega' => 'numeric', 
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'O campo categoria é obrigatório.', 
            'categoria.numeric' => 'Erro ao selecionar a categoria.', 
            'titulo.required' => 'O campo titulo é obrigatório.', 
            'titulo.min' => 'O campo titulo deve conter no mínimo 3 caracteres.', 
            'descricao.required' => 'O campo descricao é obrigatório.', 
            'descricao.min' => 'O campo descrição deve conter no mínimo 25 caracteres.', 
            'cidade_id.required' => 'O campo cidade é obrigatório.', 
            'cidade_id.numeric' => 'Erro ao selecionar a cidade.', 
            'valor.required' => 'O campo preço é obrigatório.', 
            'moeda.required' => 'O campo moeda é obrigatório.', 
            'moeda.numeric' => 'Erro ao selecionar a moeda.',
            'condicao.required' => 'O campo condição é obrigatório.', 
            'condicao.alpha' => 'Erro ao selecionar condição.',              
            'estado_id.required' => 'O campo estado é obrigatório.',  
            'estado_id.numeric' => 'Erro ao selecionar o estado.',         
        ];
    }
}
