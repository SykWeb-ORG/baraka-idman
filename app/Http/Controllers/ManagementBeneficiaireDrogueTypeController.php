<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\DrogueType;
use Illuminate\Http\Request;

class ManagementBeneficiaireDrogueTypeController extends Controller
{
    public function index()
    {

        $drogue_types = DrogueType::all();
        return response()->json([
            'drogue_types' => $drogue_types,
        ]);
    }
    public function matchBeneficiaireDrogueTypes(Request $request, Beneficiaire $beneficiaire)
    {
        
        $beneficiaire->drogue_types()->detach();
        for ($i=0; $i < count($request->drogue_types); $i++) { 
            $frequence = ['frequence' => $request->frequences[$i]];
            $beneficiaire->drogue_types()->attach($request->drogue_types[$i], $frequence);
        }
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        return response()->json($result, $status);
    }
}
