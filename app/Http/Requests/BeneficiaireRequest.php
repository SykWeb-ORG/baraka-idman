<?php

namespace App\Http\Requests;

use App\Models\Beneficiaire;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
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
        if ($this->method() == Request::METHOD_PUT) {
            $beneficiaire = Beneficiaire::where('nb_dosier', $this->nb_dossier)
                                        ->first();
        }
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
            'date_naissance' => [
                'required',
                'date',
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
            // 'type_travail' => [
            //     'required',
            // ],
            'nb_dossier' => [
                'sometimes',
                'numeric',
                ($this->method() != Request::METHOD_PUT)?'unique:App\Models\Beneficiaire,nb_dosier':Rule::unique('beneficiaires', 'nb_dosier')->ignore($beneficiaire),
            ],
            'unite_addiction' => [
                'sometimes',
                Rule::in($unities_values),
            ],
        ];
    }
}
