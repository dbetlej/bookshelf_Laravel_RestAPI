<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookSearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'search' => ['nullable','string','max:255']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'search.string' => 'Pole wyszukiwania musi być ciągiem znaków.',
            'search.max' => 'Pole wyszukiwania nie może być dłuższe niż :max znaków.'
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
