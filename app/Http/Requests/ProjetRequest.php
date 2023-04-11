<?php

namespace App\Http\Requests;

use App\Models\Partenaire;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjetRequest extends FormRequest
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
        // retrieve all partenaires & select only the value of the "id" column.
        $partenaires = Partenaire::all(['id'])->map(function ($partenaire, $key) {
            return $partenaire['id'];
        });
        return [
            'projet_num_concention' => [
                'present',
                'required',
                'numeric',
            ],
            'projet_titre' => [
                'present',
                'required',
            ],
            'projet_description' => [
                'sometimes',
            ],
            'projet_partenaire' => [
                'sometimes',
                Rule::in($partenaires),
            ],
            'projet_objectif_homme' => [
                'sometimes',
                'numeric',
            ],
            'projet_objectif_femme' => [
                'sometimes',
                'numeric',
            ],
            'projet_objectif_15' => [
                'sometimes',
                'numeric',
            ],
            'projet_objectif_15_18' => [
                'sometimes',
                'numeric',
            ],
            'projet_objectif_18' => [
                'sometimes',
                'numeric',
            ],
            'projet_periode' => [
                'sometimes',
                'date',
            ],
        ];
    }
}
