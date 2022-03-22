<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UndPerguntaRequest extends Request {
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
		$rules = ['pergunta' => 'required'];

		foreach ($this->request->get('opcoes') as $key => $val) {
			$rules['opcoes.' . $key] = 'required';
		}
		return $rules;
	}

	public function messages() {

		$messages = ['required' => 'O campo :attribute é obrigatório;'];
		foreach ($this->request->get('opcoes') as $key => $val) {
			$messages['opcoes.' . $key . '.required'] = "Por favor, preencha ou exclua a opção " . ($key + 1) . ' das alternativas! ';
		}
		return $messages;

	}
}
