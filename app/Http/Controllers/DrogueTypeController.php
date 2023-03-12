<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrogueTypeRequest;
use App\Models\DrogueType;
use Illuminate\Http\Request;

class DrogueTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drogue_types = DrogueType::all();
        return response()->json(
            [
                'drogue_types' => $drogue_types,
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
    public function store(DrogueTypeRequest $request)
    {
        $drogueType = new DrogueType;
        $drogueType->drogue_nom = $request->drogue_nom;
        if ($drogueType->save()) {
            $result = $drogueType;
            $status = 200;
            $msg = "Type de drogue ajouté avec success.";
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrogueType  $drogueType
     * @return \Illuminate\Http\Response
     */
    public function show(DrogueType $drogueType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrogueType  $drogueType
     * @return \Illuminate\Http\Response
     */
    public function edit(DrogueType $drogueType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrogueType  $drogueType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrogueType $drogueType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrogueType  $drogueType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrogueType $drogueType)
    {
        //
    }
}
