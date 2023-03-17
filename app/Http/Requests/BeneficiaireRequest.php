<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BeneficiaireRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $unities_values = [
            'jour',
            'mois',
            'annee',
        ];
        return [
            'prenom' => [
                'required',
            ],
            'nom' => [
                'required',
            ],
            'adresse' => [
                'required',
            ],
            'sexe' => [
                'required',
            ],
            'cin' => [
                'required',
            ],
            'telephone' => [
                'required',
            ],
            'type_travail' => [
                'required',
            ],
            'nb_dossier' => [
                'sometimes',
                'numeric',
                'unique:App\Models\Beneficiaire,nb_dosier',
            ],
            'unite_addiction' => [
                'required',
                Rule::in($unities_values),
            ],
        ];
    }
}
