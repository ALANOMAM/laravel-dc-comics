<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //questo era false e l'ho messo true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // qui inserisco le mie validazioni.
            'title'=>'required|max:100',
            'description' => 'nullable',
            'thumb' =>'nullable',
            'price' =>'required',
            'series' => 'required',
            'sale_date' => 'required',
            'type' => 'required|max:100',
            'artists' => 'required',
            'writers' => 'required', 
        ];
    }

//traduzione degli errori in italiano
public function messages(): array {
    return [
        'title.required' => 'Il titolo deve essere inserito',
        'title.max' => "Il titolo deve avere massimo :max caratteri",
        'type.max' => "La tipologia deve avere massimo :max caratteri",
        'type.required' => 'La tipologia deve essere inserita',
        'src.max' => "Inserisci un indirizzo di massimo :max caratteri",
        'cooking-time.required' => "Il tempo di cottura deve essere inserito",
        'cooking-time.max' => "Inserisci un tempo di cottura di massimo :max caratteri",
        'weight.required' => "Il peso deve essere inserito",
        'weight.max' => "Inserisci un peso di massimo :max caratteri",
    ];
}




}
