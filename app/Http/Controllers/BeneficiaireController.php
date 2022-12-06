<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiaireRequest;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BeneficiaireController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Beneficiaire::class, 'beneficiaire');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiaires = Beneficiaire::all();
        return view('interTerrain.listing', compact('beneficiaires'));
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
        $beneficiaire->niveau_scolaire = $request->niveau_scolaire;
        $beneficiaire->situation_familial = $request->situation_familial;
        $beneficiaire->orphelin = $request->orphelin;
        $beneficiaire->profession = $request->profession;
        $beneficiaire->zone_habitation = $request->zone_habitation;
        $beneficiaire->localisation = $request->localisation;
        $beneficiaire->famille_informee = $request->famille_informee;
        $beneficiaire->age_debut_addiction = $request->age_debut_addiction;
        $beneficiaire->duree_addiction = $request->duree_addiction;
        $beneficiaire->ts = $request->ts;
        // if (Auth::user()->intervenant->beneficiaires()->save($beneficiaire)) {
        //     $result = $beneficiaire;
        //     $status = 200;
        // } else {
        //     $result = 'probleme au serveur.';
        //     $status = 500;
        // }
        // return response()->json($result, $status);
        if (Auth::user()->intervenant->beneficiaires()->save($beneficiaire)) {
            // $result = $beneficiaire;
            // $status = 200;
            $result = 'Utilisateur ajouté avec success';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
            $status = 'danger';
            $icon = 'fa-times';
        }
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
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
        return view('interTerrain.modifier', compact('beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BeneficiaireRequest $request
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function update(BeneficiaireRequest $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->prenom = $request->prenom;
        $beneficiaire->nom = $request->nom;
        $beneficiaire->adresse = $request->adresse;
        $beneficiaire->sexe = $request->sexe;
        $beneficiaire->cin = $request->cin;
        $beneficiaire->telephone = $request->telephone;
        $beneficiaire->type_travail = $request->type_travail;
        $beneficiaire->niveau_scolaire = $request->niveau_scolaire;
        $beneficiaire->situation_familial = $request->situation_familial;
        $beneficiaire->orphelin = $request->orphelin;
        $beneficiaire->profession = $request->profession;
        $beneficiaire->zone_habitation = $request->zone_habitation;
        $beneficiaire->localisation = $request->localisation;
        $beneficiaire->famille_informee = $request->famille_informee;
        $beneficiaire->age_debut_addiction = $request->age_debut_addiction;
        $beneficiaire->duree_addiction = $request->duree_addiction;
        $beneficiaire->ts = $request->ts;
        if ($beneficiaire->update()) {
            // $result = $beneficiaire;
            // $status = 200;
            $result = 'Utilisateur modifié avec succés';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
            $status = 'danger';
            $icon = 'fa-times';
        }
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiaire $beneficiaire)
    {
        if ($beneficiaire->delete()) {
            // $result = $beneficiaire;
            // $status = 200;
            $result = 'Utilisateur supprimé avec succés';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
            $status = 'danger';
            $icon = 'fa-times';
        }
        // return response()->json($result, $status);
        session()->flash('msg', $result);
        session()->flash('status', $status);
        session()->flash('icon', $icon);
        return back();
    }
}
