<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormTrabalheConoscoRequest extends Request
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
            'nome' => 'required',
            'email' => 'required',
            'mensagem' => 'required',
            'area' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }
    public function messages() {
        return [
            'nome.required' => 'O Nome é um campo obrigatório;',
            'email.required' => 'O E-mail é um campo obrigatório;',
            'mensagem.required' => 'A Mensagem é um campo obrigatório;',
            'area.required' => 'A área em que deseja trabalhar é um campo obrigatório;',
            'g-recaptcha-response.required' => 'Por favor verifique que você não é um robo;',
        ];
    }
}
