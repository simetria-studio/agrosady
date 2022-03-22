<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlogPostRequest extends Request {
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
			'subtitulo' => 'max:500',
			'descricao' => 'required',
			'categorias' => 'required',
		];
	}

	public function messages() {
		return [
			'titulo.required' => 'O Título é um campo obrigatório;',
			'categorias.required' => 'É obrigatório informar ao menos uma categoria;',
		];
	}
}
