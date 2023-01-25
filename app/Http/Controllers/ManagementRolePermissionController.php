<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class ManagementRolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
    public function matchRolePermission(Request $request)
    {
        if ($role = Role::find($request->role)) {
            $role->permissions()->detach();
            $role->permissions()->attach($request->permissions);
            $role->refresh();
            $result = $role;
            $status = 200;
        }else {
            $result = "role n'existe pas.";
            $status = 404;
        }
        return response()->json($result, $status);
    }
}
