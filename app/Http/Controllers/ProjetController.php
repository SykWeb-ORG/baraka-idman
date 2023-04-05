<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetRequest;
use App\Models\Partenaire;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Projet::class, 'projet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();
        return response()->json(
            [
                'projets' => $projets,
            ]
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
    public function store(ProjetRequest $request)
    {
        $projet = new Projet;
        $projet->projet_num_concention = $request->projet_num_concention;
        $projet->projet_titre = $request->projet_titre;
        $request->whenFilled('projet_partenaire', function ($input) use ($projet) {
            if ($partenaire = Partenaire::find($input)) {
                $partenaire->projets()->save($projet);
            }
        });
        $request->whenFilled('projet_description', function ($input) use ($projet) {
            $projet->projet_description = $input;
        });
        $request->whenFilled('projet_objectif_homme', function ($input) use ($projet) {
            $projet->projet_objectif_homme = $input;
        });
        $request->whenFilled('projet_objectif_femme', function ($input) use ($projet) {
            $projet->projet_objectif_femme = $input;
        });
        $request->whenFilled('projet_objectif_15', function ($input) use ($projet) {
            $projet->projet_objectif_15 = $input;
        });
        $request->whenFilled('projet_objectif_15_18', function ($input) use ($projet) {
            $projet->projet_objectif_15_18 = $input;
        });
        $request->whenFilled('projet_objectif_18', function ($input) use ($projet) {
            $projet->projet_objectif_18 = $input;
        });
        if ($projet->save()) {
            $result = $projet;
            $status = 200;
            $msg = "Projet ajouté avec success.";
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
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetRequest $request, Projet $projet)
    {
        $projet->projet_num_concention = $request->projet_num_concention;
        $projet->projet_titre = $request->projet_titre;
        $request->whenFilled('projet_partenaire', function ($input) use ($projet) {
            if ($partenaire = Partenaire::find($input)) {
                $partenaire->projets()->save($projet);
            }
        });
        $request->whenFilled('projet_description', function ($input) use ($projet) {
            $projet->projet_description = $input;
        });
        $request->whenFilled('projet_objectif_homme', function ($input) use ($projet) {
            $projet->projet_objectif_homme = $input;
        });
        $request->whenFilled('projet_objectif_femme', function ($input) use ($projet) {
            $projet->projet_objectif_femme = $input;
        });
        $request->whenFilled('projet_objectif_15', function ($input) use ($projet) {
            $projet->projet_objectif_15 = $input;
        });
        $request->whenFilled('projet_objectif_15_18', function ($input) use ($projet) {
            $projet->projet_objectif_15_18 = $input;
        });
        $request->whenFilled('projet_objectif_18', function ($input) use ($projet) {
            $projet->projet_objectif_18 = $input;
        });
        if ($projet->update()) {
            $result = $projet;
            $status = 200;
            $msg = "Projet modifié avec success.";
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
