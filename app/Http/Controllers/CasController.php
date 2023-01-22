<?php

namespace App\Http\Controllers;

use App\Models\Cas;
use Illuminate\Http\Request;

class CasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cas::all();
        return response()->json(
            [
                'cases' => $cases,
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
    public function store(Request $request)
    {
        $cas = new Cas;
        $cas->cas_nom = $request->cas_nom;
        if ($cas->save()) {
            $result = $cas;
            $status = 200;
            $msg = "cas ajouté avec success.";
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
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function show(Cas $cas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cas $cas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cas $cas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cas $cas)
    {
        //
    }
}
