<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagementBeneficiaireCasController extends Controller
{
    public function index(Beneficiaire $beneficiaire)
    {
        if (!Gate::allows('beneficiaire-cas-ability')) {
            abort(403);
        }
        return view('superUser.AffectCasJuridiqueBenef', compact('beneficiaire'));
    }
    public function matchBeneficiaireCas(Request $request, Beneficiaire $beneficiaire)
    {
        if (!Gate::allows('beneficiaire-cas-ability')) {
            abort(403);
        }
        $beneficiaire->cas()->detach();
        $beneficiaire->cas()->attach($request->cas);
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
