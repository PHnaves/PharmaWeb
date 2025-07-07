<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'type_user' => ['required', 'string', 'in:Administrador,Farmaceutico,medico'],
            'work_location' => ['required', 'string', 'in:UBS1,UPA1,UBS2,UPA2']
        ];
    }

    public function messages() : array
    {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'password.required' => 'O campo senha é obrigatório',
            'type_user.required' => 'O campo tipo de usuário é obrigatório',
            'type_user.in' => 'O tipo de usuário deve ser Administrador, Farmaceutico ou medico',
            'work_location.required' => 'O campo local de trabalho é obrigatório',
            'work_location.in' => 'O local de trabalho deve ser UBS1, UPA1, UBS2 ou UPA2',
        ];
    }
}
