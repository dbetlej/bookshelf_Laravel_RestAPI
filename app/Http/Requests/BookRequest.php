<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class BookRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'publication_year' => ['required'.'integer','min:1900','max:' . date('Y')],
            'publisher' => ['required','string','max:255'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Pole tytuł jest wymagane.',
            'title.string' => 'Pole tytuł musi być ciągiem znaków.',
            'title.max' => 'Pole tytuł nie może być dłuższe niż :max znaków.',

            'author.required' => 'Pole autor jest wymagane.',
            'author.string' => 'Pole autor musi być ciągiem znaków.',
            'author.max' => 'Pole autor nie może być dłuższe niż :max znaków.',

            'publication_year.required' => 'Pole rok publikacji jest wymagane.',
            'publication_year.integer' => 'Pole rok publikacji musi być liczbą całkowitą.',
            'publication_year.min' => 'Pole rok publikacji nie może być wcześniejszy niż :min.',
            'publication_year.max' => 'Pole rok publikacji nie może być późniejszy niż aktualny rok.',

            'publisher.required' => 'Pole wydawca jest wymagane.',
            'publisher.string' => 'Pole wydawca musi być ciągiem znaków.',
            'publisher.max' => 'Pole wydawca nie może być dłuższe niż :max znaków.',
        ];
    }
}
