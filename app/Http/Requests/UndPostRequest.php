<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UndPostRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'titulo' => 'required',
            'descricao' => 'required',
            'categorias' => 'required',
            'imagem_destaque' => 'mimes:jpeg,jpg,png,gif',
        ];
    }

    public function messages() {
        return [
            'titulo.required' => 'O Título é um campo obrigatório;',
            'categorias.required' => 'A Categoria é um campo obrigatório;',
        ];
    }

}
