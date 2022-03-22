<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrcamentoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_carga' => 'required',
            'tomador_servico' => 'required',
            'origem' => 'required',
            'destino' => 'required',
            'peso' => 'required',
            'valor_nota' => 'required'
        ];
    }

     public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.'
        ];
    }
}
