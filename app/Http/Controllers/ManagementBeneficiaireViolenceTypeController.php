<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\ViolenceType;
use Illuminate\Http\Request;

class ManagementBeneficiaireViolenceTypeController extends Controller
{
    public function index()
    {

        $violence_types = ViolenceType::all();
        return response()->json([
            'violence_types' => $violence_types,
        ]);
    }
    public function matchBeneficiaireViolenceTypes(Request $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->violence_types()->detach();
        $beneficiaire->violence_types()->attach($request->violence_types);
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        return response()->json($result, $status);
    }
}
