<?php

namespace App\Http\Requests;

use App\Rules\EmpresaRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'usuario_nome' => 'required|max:255',
            'empresa_id' => ['required', 'integer', new EmpresaRule],
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
            'usuario_nome.required' => 'O nome do usuário é obrigatório.',
            'usuario_nome.max' => 'O nome do usuário deve ter no máximo 255 caracteres.',

            'empresa_id.required' => 'A empresa é obrigatória.',
            'empresa_id.integer' => 'A empresa deve ser um número inteiro.',
        ];
    }
}
