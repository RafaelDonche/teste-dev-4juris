<?php

namespace App\Http\Requests;

use App\Rules\UsuarioRule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateFormRequest extends FormRequest
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
            'cliente_nome' => 'nullable|max:255',
            'usuario_id' => ['nullable', 'integer', new UsuarioRule],
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
            'cliente_nome.max' => 'O nome do cliente deve ter no máximo 255 caracteres.',

            'usuario_id.integer' => 'O usuário deve ser um número inteiro.',
        ];
    }
}
