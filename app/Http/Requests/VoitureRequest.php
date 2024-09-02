<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoitureRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule','array<mixed>','string>
     */
    public function rules(): array
    {
        $annee = date('Y');
        return [
            'marque_modele' => ['required', 'string'],
            'annee_fabrication' => ['required', 'integer', "between:2020,$annee"],
            'etat' => ['required', 'string'],
            'type_transmission' => ['required', 'string'],
            'type_carburant' => ['required', 'string'],
            'categorie' => ['required', 'string'],
            'nb_portes' => ['required', 'integer'],
            'nb_places' => ['required', 'integer', 'min:2', 'max:9'],
            'capacite_coffre' => ['required', 'integer', 'min:0', 'max:5'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['required', 'string', 'max:255'],
            'disponibilite' => ['required', 'string'],
            'prix' => ['required', 'integer',]
        ];
    }
}
