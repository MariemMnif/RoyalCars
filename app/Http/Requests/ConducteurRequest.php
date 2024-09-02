<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConducteurRequest extends FormRequest
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

            'gendre' => ['required', 'in:Mr,Mme'],
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:conducteurs,email'],
            'mdp' => ['required', 'string', 'min:8'],
            'telephone' =>  ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'date_naissance' => ['required', 'date', 'before:today'],
            'date_permis' => ['required', 'date', 'before:today'],


        ];
    }
}
