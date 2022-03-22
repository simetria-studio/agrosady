<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BvArquivoRequest extends Request
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
            'arquivo' => 'required',
            'nome' => 'required',

        ];
    }

    public function messages(){
        return [
            'arquivo.required' => 'O Arquivo é um campo obrigatório;',
            'nome.required' => 'O Nome é um campo obrigatório;',
        ];
    }
}
