<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntervenantZoneRequest;
use App\Models\Intervenant;
use Illuminate\Http\Request;

class ManagementIntervenantZoneController extends Controller
{
    public function matchIntervenantZones(IntervenantZoneRequest $request, Intervenant $intervenant)
    {
        $intervenant->zones()->detach();
        $intervenant->zones()->attach($request->zones);
        $intervenant->refresh();
        $result = $intervenant;
        $status = 200;
        $msg = "L'affectation est bien faite.";
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }
}
