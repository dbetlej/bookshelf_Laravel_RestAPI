<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Pole nazwa jest wymagane.',
            'name.string' => 'Pole nazwa musi być ciągiem znaków.',
            'name.max' => 'Pole nazwa nie może być dłuższe niż :max znaków.',

            'email.required' => 'Pole adres email jest wymagane.',
            'email.email' => 'Pole adres email musi być poprawnym adresem email.',
            'email.unique' => 'Podany adres email jest już zajęty.',

            'password.required' => 'Pole hasło jest wymagane.',
            'password.string' => 'Pole hasło musi być ciągiem znaków.',
            'password.min' => 'Pole hasło musi mieć co najmniej :min znaków.',
            'password.confirmed' => 'Potwierdzenie hasła nie zgadza się z polem hasło.',
            'password_confirmation.required' => 'Pole potwierdzenie hasła jest wymagane.'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
