<?php

namespace App\Http\Requests;

use App\Models\Beneficiaire;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SocialeVisiteRequest extends FormRequest
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
        // retrieve all beneficiaires & select only the value of the "id" column.
        $beneficiaires = Beneficiaire::all(['id'])->map(function($beneficiaire, $key){
            return $beneficiaire['id'];
        });
        $validation_rules = [
            'visite_date' => [
                'present',
                'required',
                'date',
            ],
        ];
        if (Request::METHOD_POST == 'POST') {
            $validation_rules['beneficiaire'] = [
                'present',
                'required',
                'numeric',
                Rule::in($beneficiaires),
            ];
        }
        return $validation_rules;
    }
}
