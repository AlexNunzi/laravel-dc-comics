<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // Validator rules
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|max:999999.99|min:1',
            'series' => 'required|max:30',
            'sale_date' => 'required',
            'type' => 'required|max:30'
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
            // Validator messages
            'required' => 'Il campo :attribute è obbligatorio.',
            'max' => 'Il campo :attribute non deve superare i :max caratteri',
            'price.max' => 'Il campo :attribute non può essere maggiore di 999999.99',
            'price.min' => 'Il campo :attribute non può essere minore di 1.00',
            'url' => 'Il campo :attribute deve contenere un URL valido',
            'numeric' => 'Il campo :attribute deve essere un numero',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // Validator attribute
            'title' => 'Titolo del fumetto',
            'description' => 'Descrizione',
            'thumb' => 'URL immagine del fumetto',
            'price' => 'Prezzo',
            'series' => 'Serie',
            'sale_date' => 'Data di vendita',
            'type' => 'Tipologia',
        ];
    }
}
