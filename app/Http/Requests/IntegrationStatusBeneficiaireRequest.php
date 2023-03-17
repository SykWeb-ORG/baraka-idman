<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IntegrationStatusBeneficiaireRequest extends FormRequest
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
        $integration_status_values = [
            'integration',
            'pre integration',
        ];
        return [
            'integration_status' => [
                'required',
                'present',
                Rule::in($integration_status_values),
            ],
        ];
    }
}
