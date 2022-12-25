<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagementBeneficiaireAteliersController extends Controller
{
    public function index(Beneficiaire $beneficiaire)
    {
        if (!Gate::allows('beneficiaire-ateliers-ability')) {
            abort(403);
        }
        return view('', $beneficiaire);
    }
    public function matchBeneficiaireAteliers(Request $request, Beneficiaire $beneficiaire)
    {
        if (!Gate::allows('beneficiaire-ateliers-ability')) {
            abort(403);
        }
        $beneficiaire->groupes()->detach();
        $beneficiaire->groupes()->attach($request->groupes);
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        $msg = 'Les changements sont bien effectués.';
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }
}
