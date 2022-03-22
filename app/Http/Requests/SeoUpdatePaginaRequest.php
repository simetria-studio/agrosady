<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeoUpdatePaginaRequest extends Request
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
            'seo_title' => 'max:70',
            'seo_description' => 'max:160',
            'seo_keywords' => 'max:200',
        ];
    }
}
