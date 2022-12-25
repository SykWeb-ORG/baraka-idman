<?php

namespace App\Http\Requests;

use App\Models\Atelier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupeRequest extends FormRequest
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
        // retrieve all ateliers & select only the value of the "id" column.
        $ateliers = Atelier::all(['id'])->map(function($atelier, $key){
            return $atelier['id'];
        });
        return [
            'groupe_nom' => [
                'present',
                'required',
            ],
            'atelier' => [
                'present',
                'required',
                'numeric',
                Rule::in($ateliers),
            ]
        ];
    }
}
