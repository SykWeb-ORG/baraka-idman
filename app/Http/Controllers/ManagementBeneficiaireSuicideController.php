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
                // $result = $beneficiaire;
                // $status = 200;
                $result = 'Les changements sont bien effectués.';
                $status = 'success';
                $icon = 'fa-check';
            } else {
                $result = 'probleme au serveur.';
                // $status = 500;
                $status = 'danger';
                $icon = 'fa-times';
            }
        }
        else{
            $result = 'Les changements sont bien effectués.';
            $status = 'success';
            $icon = 'fa-check';
        }
        // return response()->json($result, $status);

        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    }
}
