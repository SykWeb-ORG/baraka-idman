<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupeRequest;
use App\Models\Atelier;
use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Groupe::class, 'groupe');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::with('atelier')->get();
        return response()->json(
            [
                'groupes' => $groupes,
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
    public function store(GroupeRequest $request)
    {
        $groupe = new Groupe;
        $groupe->groupe_nom = $request->groupe_nom;
        $atelier = Atelier::find($request->atelier);
        if ($atelier->groupes()->save($groupe)) {
            $result = $groupe;
            $status = 200;
            $msg = "Groupe ajouté avec success.";
        } else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Groupe $groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupe $groupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupe $groupe)
    {
        $groupe->groupe_nom = $request->groupe_nom;
        $atelier = Atelier::find($request->atelier);
        if ($atelier->groupes()->save($groupe)) {
            $result = $groupe;
            $status = 200;
            $msg = "Groupe modifié avec success.";
        } else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupe $groupe)
    {
        if ($groupe->delete()) {
            $result = $groupe;
            $status = 200;
            $msg = "Groupe supprimé avec success.";
        } else {
            $result = null;
            $status = 500;
            $msg = "Proléme au serveur.";
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    }
}
