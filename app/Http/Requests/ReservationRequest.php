<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'dateLocation' => 'required|date_format:d/m/Y|after_or_equal:today',
            'heureLocation' => 'required|date_format:H:i',
            'dateRetour' => 'required|date_format:d/m/Y|after_or_equal:dateLocation',
            'heureRetour' => 'required|date_format:H:i',
           'etat'=>'required|string',
            'montant'=>'required|numeric',
        ];
    }
    public function messages()
{
    return [
        'dateLocation.required' => 'La date de location est requise.',
        'heureLocation.required' => 'L\'heure de location est requise.',
        'dateRetour.required' => 'La date de retour est requise.',
        'heureRetour.required' => 'L\'heure de retour est requise.',
        'etat.required' => 'L\'état est requis.',
        'montant.required' => 'Le montant est requis.',
    ];
}
}
