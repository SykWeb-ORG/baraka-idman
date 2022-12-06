<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\Couverture;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementBeneficiaireCouvertureController extends Controller
{
    public function index()
    {

        $couvertures = Couverture::all();
        return response()->json([
            'couvertures' => $couvertures,
        ]);
    }
    public function matchRolePermission(Request $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->couvertures()->detach();
        $beneficiaire->couvertures()->attach($request->couvertures);
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        return response()->json($result, $status);
    }
}
