<?php

namespace App\Http\Requests;

use App\Rules\UsuarioRule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_nome' => 'required|max:255',
            'usuario_id' => ['required', 'integer', new UsuarioRule],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cliente_nome.required' => 'O nome do cliente é obrigatório.',
            'cliente_nome.max' => 'O nome do cliente deve ter no máximo 255 caracteres.',

            'usuario_id.required' => 'O usuário é obrigatório.',
            'usuario_id.integer' => 'O usuário deve ser um número inteiro.',
        ];
    }
}
