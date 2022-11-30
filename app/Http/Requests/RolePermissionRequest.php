<?php

namespace App\Http\Requests;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RolePermissionRequest extends FormRequest
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
        // retrieve all roles & select only the value of the "id" column.
        $roles = Role::all(['id'])->map(function($role, $key){
            return $role['id'];
        });
        $permissions = Permission::all(['id'])->map(function($action, $key){
            return $action['id'];
        });
        $rules = [
            'role' => [
                'required',
                Rule::in($roles)
            ],
            'permissions' => [
                'required',
                Rule::in($permissions)
            ]
        ];
        return $rules;
    }
}
