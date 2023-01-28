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
        return view('superUser.AffectGroupBeneficiaire', compact('beneficiaire'));
    }
    public function matchBeneficiaireAteliers(Request $request, Beneficiaire $beneficiaire)
    {
        if (!Gate::allows('beneficiaire-ateliers-ability')) {
            abort(403);
        }
        if ($request->groupesToDetach) {
            $beneficiaire->groupes()->detach($request->groupesToDetach);
            $beneficiaire->groupes()->attach($request->groupesToAttach);
        }
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
