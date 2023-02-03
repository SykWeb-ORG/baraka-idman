<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\SuicideCause;
use Illuminate\Http\Request;

class ManagementBeneficiaireSuicideController extends Controller
{
    public function matchBeneficiaireSuicideCauses(Request $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->suicide_causes()->delete();
        if ($request->suicide_causes != '') {
            $suicide_cause = new SuicideCause;
            $suicide_cause->cause = $request->suicide_causes;
            if ($beneficiaire->suicide_causes()->save($suicide_cause)) {
                $beneficiaire->refresh();
                $result = $beneficiaire;
                $msg = 'Les changements sont bien effectués.';
                $status = 200;
            } else {
                $result = $beneficiaire;
                $msg = 'probleme au serveur.';
                $status = 500;
            }
        }
        else{
            $result = $beneficiaire;
            $msg = 'Les changements sont bien effectués.';
            $status = 200;
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }
}
