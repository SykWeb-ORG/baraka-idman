<?php

namespace App\Http\Controllers;

use App\Models\ProgrammeType;
use Illuminate\Http\Request;

class ProgrammeTypeController extends Controller
{
    public function __construct() {
        $this->authorizeResource(ProgrammeType::class, 'programmeType');
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
    public function store(Request $request)
    {
        $programme_type = new ProgrammeType;
        $programme_type->programme_type_nom = $request->programme_type_nom;
        if ($programme_type->save()) {
            $result = $programme_type;
            $status = 200;
            $msg = "Type de programme ajouté avec success.";
        }else {
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
     * @param  \App\Models\ProgrammeType  $programmeType
     * @return \Illuminate\Http\Response
     */
    public function show(ProgrammeType $programmeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgrammeType  $programmeType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammeType $programmeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgrammeType  $programmeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgrammeType $programmeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgrammeType  $programmeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgrammeType $programmeType)
    {
        //
    }
}
