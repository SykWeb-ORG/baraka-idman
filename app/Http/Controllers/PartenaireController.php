<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartenaireRequest;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Partenaire::class, 'partenaire');
    }

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
    public function store(PartenaireRequest $request)
    {
        $partenaire = new Partenaire;
        $partenaire->partenaire_nom = $request->partenaire_nom;
        $partenaire->partenaire_objectif = $request->partenaire_objectif;
        $request->whenHas('logo', function ($logoInp) use ($partenaire)
        {
            $partenaire->partenaire_logo = 'storage/' . $logoInp->store('partenaire_logos');
        });
        if ($partenaire->save()) {
            $result = $partenaire;
            $status = 200;
            $msg = "Partenaire ajouté avec success.";
        } else {
            $result = null;
            $status = 500;
            $msg = "Probléme au serveur.";
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
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }
}
