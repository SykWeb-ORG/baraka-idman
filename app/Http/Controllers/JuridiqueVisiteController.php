<?php

namespace App\Http\Controllers;

use App\Http\Requests\JuridiqueVisiteRequest;
use App\Models\Beneficiaire;
use App\Models\JuridiqueVisite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JuridiqueVisiteController extends Controller
{
    public function __construct() {
        $this->authorizeResource(JuridiqueVisite::class, 'juridiqueVisite');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin) {
            $juridique_visites = JuridiqueVisite::all();
            $juridique_visites->loadMissing('juridique_assistant.user');
        } else {
            $juridique_visites = Auth::user()->juridique_assistant->juridique_visites;
        }
        return response()->json(
            [
                'juridique_visites' => $juridique_visites,
            ],
            200
        );
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
    public function store(JuridiqueVisiteRequest $request)
    {
        $juridiqueVisite = new JuridiqueVisite;
        $juridiqueVisite->visite_remarque = $request->visite_remarque;
        if ($request->has('visite_preuve')) {
            $path = $request->file('visite_preuve')->store('juridique_preuves'); 
            $juridiqueVisite->visite_preuve = 'storage/' . $path;
        }
        $beneficiaire = Beneficiaire::find($request->beneficiaire);
        if ($beneficiaire->juridique_visites()->save($juridiqueVisite) && Auth::user()->juridique_assistant->juridique_visites()->save($juridiqueVisite)) {
            $result = $juridiqueVisite;
            $status = 200;
            $msg = "Visite juridique ajoutée avec success.";
        }else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'status' => $status,
            ],
            $status
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Http\Response
     */
    public function show(JuridiqueVisite $juridiqueVisite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Http\Response
     */
    public function edit(JuridiqueVisite $juridiqueVisite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JuridiqueVisite $juridiqueVisite)
    {
        $juridiqueVisite->visite_remarque = $request->visite_remarque;
        if ($request->has('visite_preuve')) {
            if ($juridiqueVisite->visite_preuve) {
                Storage::delete(Str::of($juridiqueVisite->visite_preuve)->remove('storage/'));
            }
            $path = $request->file('visite_preuve')->store('juridique_preuves'); 
            $juridiqueVisite->visite_preuve = 'storage/' . $path;
        }
        $beneficiaire = Beneficiaire::find($request->beneficiaire);
        if ($beneficiaire->juridique_visites()->save($juridiqueVisite)) {
            $result = $juridiqueVisite;
            $status = 200;
            $msg = "Visite juridique modifiée avec success.";
        }else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'status' => $status,
            ],
            $status
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Http\Response
     */
    public function destroy(JuridiqueVisite $juridiqueVisite)
    {
        if ($juridiqueVisite->delete()) {
            $result = $juridiqueVisite;
            $status = 200;
            $msg = "Visite sociale supprimée avec success.";
        } else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
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
