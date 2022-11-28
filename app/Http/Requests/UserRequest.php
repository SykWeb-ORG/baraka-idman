<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // retrieve all roles & select only the value of the "role_nom" column.
        $roles = Role::all(['role_nom'])->map(function($role, $key){
            return $role['role_nom'];
        });
        return [
            'first_name' => [
                'required',
                'alpha',
            ],
            'last_name' => [
                'required',
                'alpha',
            ],
            'cin' => [
                'required',
                'alpha_num',
            ],
            'phone_number' => 'required',
            'birthday_date' => [
                'required',
                'date',
            ],
            'email' => [
                'required',
                'email',
            ],
            'role' => [
                'required',
                Rule::in($roles)
            ],
        ];
    }
}
