<?php

namespace App\Http\Requests;

use App\Models\Programme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlaceRequest extends FormRequest
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
        // retrieve all programmes & select only the value of the "id" column as array.
        $programmes = Programme::all(['id'])->map(function($programme, $key){
            return $programme['id'];
        })->toArray();
        return [
            'lieu' => [
                'present',
                'required',
            ],
            'programme_date' => [
                'present',
                'required',
            ],
            'programme' => [
                'present',
                'required',
                Rule::in($programmes),
            ],
        ];
    }
}
