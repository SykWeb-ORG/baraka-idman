<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjetStatusRequest extends FormRequest
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
        $projet_status_values = [
            'termine',
            'en cours',
        ];
        return [
            'projet_status' => [
                'required',
                'present',
                Rule::in($projet_status_values),
            ],
        ];
    }
}
