<?php

namespace App\Http\Controllers;

use App\Models\MedicaleVisite;
use App\Http\Requests\MedicaleVisiteRequest;
use App\Models\Beneficiaire;
use Illuminate\Support\Facades\Auth;

class MedicaleVisiteController extends Controller
{
    public function __construct() {
        $this->authorizeResource(MedicaleVisite::class, 'medicaleVisite');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin) {
            $medicale_visites = MedicaleVisite::all();
            $medicale_visites->loadMissing('medical_assistant.user');
        } else {
            $medicale_visites = Auth::user()->medical_assistant->medicale_visites;
        }
        return response()->json(
            [
                'medicale_visites' => $medicale_visites,
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MedicaleVisiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicaleVisiteRequest $request)
    {
        $medicaleVisite = new MedicaleVisite;
        $medicaleVisite->visite_date = $request->visite_date;
        if ($request->has('visite_remarque')) {
            $medicaleVisite->visite_remarque = $request->visite_remarque;
        }
        if ($request->has('visite_presence')) {
            $medicaleVisite->visite_presence = $request->visite_presence;
        }
        $beneficiaire = Beneficiaire::find($request->beneficiaire);
        if ($beneficiaire->medicale_visites()->save($medicaleVisite) && Auth::user()->medical_assistant->medicale_visites()->save($medicaleVisite)) {
            $result = $medicaleVisite;
            $status = 200;
            $msg = "Visite médicale ajoutée avec success.";
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
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function show(MedicaleVisite $medicaleVisite)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicaleVisite $medicaleVisite)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MedicaleVisiteRequest  $request
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function update(MedicaleVisiteRequest $request, MedicaleVisite $medicaleVisite)
    {
        $medicaleVisite->visite_date = $request->visite_date;
        if ($request->has('visite_remarque')) {
            $medicaleVisite->visite_remarque = $request->visite_remarque;
        }
        if ($request->has('visite_presence')) {
            $medicaleVisite->visite_presence = $request->visite_presence;
        }
        $beneficiaire = Beneficiaire::find($request->beneficiaire);
        // if ($medicaleVisite->update()) {
        if ($beneficiaire->medicale_visites()->save($medicaleVisite)) {
            $result = $medicaleVisite;
            $status = 200;
            $msg = "Visite médicale modifiée avec success.";
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
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicaleVisite $medicaleVisite)
    {
        if ($medicaleVisite->delete()) {
            $result = $medicaleVisite;
            $status = 200;
            $msg = "Visite médicale supprimée avec success.";
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
