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
        if ($request->has('services') && $request->has('users')) {
            $services = $request->services;
            $users = $request->users;
            if (count($services) == count($users)) { // check if the count of services == count of users
                $services_users = [];
                for ($i=0; $i < count($services); $i++) { 
                    $services_users[$services[$i]] = [
                        'user_id' => $users[$i],
                    ];
                }
            }
        }
        $beneficiaire->services()->detach();
        $beneficiaire->services()->attach($services_users);
        $beneficiaire->refresh();
        $result = $beneficiaire;
        $status = 200;
        return response()->json($result, $status);
    }
}
