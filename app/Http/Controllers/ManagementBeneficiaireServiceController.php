<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\Service;
use Illuminate\Http\Request;

class ManagementBeneficiaireServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json([
            'services' => $services,
        ]);
    }
    public function matchBeneficiaireServices(Request $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->services()->detach();
        $beneficiaire->services()->attach($request->services);
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        return response()->json($result, $status);
    }
}
