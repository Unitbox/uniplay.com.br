<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class FaleConosco extends FormRequest
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
            'name' => 'required|min:1|max:191',
            'email' => 'required|email',
            'mensagem' => 'required|min:1|max:500'
        ];
    }
}
