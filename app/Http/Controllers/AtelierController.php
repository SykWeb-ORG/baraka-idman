<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    
    public function __construct() {
        $this->authorizeResource(Atelier::class, 'atelier');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ateliers = Atelier::with('groupes')->get();
        return response()->json(
            [
                'ateliers' => $ateliers,
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
    public function store(Request $request)
    {
        $atelier = new Atelier;
        $atelier->atelier_nom = $request->atelier_nom;
        if ($atelier->save()) {
            $result = $atelier;
            $status = 200;
            $msg = "Atelier ajouté avec success.";
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
     * @param  \App\Models\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function show(Atelier $atelier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function edit(Atelier $atelier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atelier $atelier)
    {
        $atelier->atelier_nom = $request->atelier_nom;
        if ($atelier->save()) {
            $result = $atelier;
            $status = 200;
            $msg = "Atelier modifié avec success.";
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
     * @param  \App\Models\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atelier $atelier)
    {
        if ($atelier->delete()) {
            $result = $atelier;
            $status = 200;
            $msg = "Atelier supprimé avec success.";
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
