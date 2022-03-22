<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdutoRequest extends Request {

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

        $regras = [
            'nome' => 'required',
            'descricao' => 'required',
            'categorias' => 'required',
            'preco' => 'numeric|between:0,99999999.99',
            'preco_promocional' => 'numeric|between:0,99999999.99',
        ];
        if ($this->request->get('preco_promocional') != '') {
            $regras['data_promocao'] = 'required';
        }

        return $regras;
    }

    public function messages() {
        return [
            'categorias.required' => 'É obrigatório informar ao menos uma categoria;',
            'descricao.required' => 'O campo Conteúdo é obrigatorio;',
            'data_promocao.required' => 'Quando existe valor promocional o campo validade da promoção é obrigatorio;',
        ];
    }

}
