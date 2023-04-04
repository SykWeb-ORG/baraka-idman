<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntervenantProgrammeRequest;
use App\Models\Intervenant;
use Illuminate\Http\Request;

class ManagementIntervenantProgrammeController extends Controller
{
    public function matchIntervenantProgrammes(IntervenantProgrammeRequest $request, Intervenant $intervenant)
    {
        $intervenant->programmes()->detach();
        $intervenant->programmes()->attach($request->programmes);
        $intervenant->refresh();
        $result = $intervenant;
        $status = 200;
        $msg = "L'affectation est bien faite.";
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'status' => $status,
            ],
            $status
        );
    }
}
