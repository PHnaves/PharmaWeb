<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'type_user' => ['required', 'string', 'in:Administrador,Farmaceutico,medico'],
            'work_location' => ['required', 'string', 'in:UBS1,UPA1,UBS2,UPA2']
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',

            'email.required' => 'O campo email é obrigatório',
            'email.string' => 'O campo email deve ser uma string',
            'email.email' => 'O campo email deve ser um email válido',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'email.unique' => 'O email já está em uso',

            'type_user.required' => 'O campo tipo de usuário é obrigatório',
            'type_user.string' => 'O campo tipo de usuário deve ser uma string',
            'type_user.in' => 'O campo tipo de usuário deve ser Administrador, Farmaceutico ou medico',

            'work_location.required' => 'O campo local de trabalho é obrigatório',
            'work_location.string' => 'O campo local de trabalho deve ser uma string',
            'work_location.in' => 'O campo local de trabalho deve ser UBS1, UPA1, UBS2 ou UPA2',
        ];
    }
}
