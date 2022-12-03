<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiaireRequest;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BeneficiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiaireRequest $request)
    {
        $beneficiaire = new Beneficiaire;
        $beneficiaire->code = Hash::make('ccc');
        $beneficiaire->prenom = $request->prenom;
        $beneficiaire->nom = $request->nom;
        $beneficiaire->adresse = $request->adresse;
        $beneficiaire->sexe = $request->sexe;
        $beneficiaire->cin = $request->cin;
        $beneficiaire->telephone = $request->telephone;
        $beneficiaire->type_travail = $request->type_travail;
        $beneficiaire->intervenant_id = 1;
        // Auth::user()->intervenant->beneficiares($beneficiaire)->save() // waiting for authentication to be completed ...
        if ($beneficiaire->save()) {
            $result = $beneficiaire;
            $status = 200;
        } else {
            $result = 'probleme au serveur.';
            $status = 500;
        }
        return response()->json($result, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiaire $beneficiaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiaire $beneficiaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiaire $beneficiaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiaire $beneficiaire)
    {
        //
    }
}
