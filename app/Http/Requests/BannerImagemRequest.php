<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannerImagemRequest extends Request
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
            'caminho' => 'required',
            'data_inicio' => 'required',
        ];
    }
    
    public function messages() {
		return [
			'caminho.required' => 'O campo Imagem é obrigatório;',
			'data_inicio.required' => 'O campo Data de Publicação é obrigatório;',
		];
	}
}
