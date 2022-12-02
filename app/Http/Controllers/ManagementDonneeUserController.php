<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonneeUserRequest;
use App\Models\Donnee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManagementDonneeUserController extends Controller
{
    public function index(User $user)
    {
        $donnees = Donnee::all()
            ->transform(function ($donnee, $key) {
                $donnee['colonne_nom'] = Str::replace('_', ' ', $donnee['colonne_nom']);
                return $donnee;
            })
            ->filter(function ($donnee, $key) {
                return $donnee['colonne_nom'] != 'created at' && $donnee['colonne_nom'] != 'updated at';
            });
        return response()->json(
            [
                'user' => $user,
                'donnees' => $donnees,
            ]
        );
        
    }

    public function matchDonneeUser(DonneeUserRequest $request, User $user)
    {
        $user->donnees()->detach();
        $user->donnees()->attach($request->donnees);
        $user->refresh();
        return response()->json($user);

    }

}
