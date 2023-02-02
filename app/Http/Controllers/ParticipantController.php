<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Participant::class, 'participant');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        return response()->json([
            'participants' => $participants,
        ]);
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
     * @param  \App\Http\Requests\ParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRequest $request)
    {
        $participant = new Participant;
        $participant->participant_nom = $request->participant_nom;
        $participant->participant_prenom = $request->participant_prenom;
        $participant->participant_cin = $request->participant_cin;
        $participant->participant_tele = $request->participant_tele;
        if ($participant->save()) {
            $result = $participant;
            $status = 200;
            $msg = "Participant ajouté avec success.";
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
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ParticipantRequest  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantRequest $request, Participant $participant)
    {
        $participant->participant_nom = $request->participant_nom;
        $participant->participant_prenom = $request->participant_prenom;
        $participant->participant_cin = $request->participant_cin;
        $participant->participant_tele = $request->participant_tele;
        if ($participant->update()) {
            $result = $participant;
            $status = 200;
            $msg = "Participant modifié avec success.";
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        if ($participant->delete()) {
            $result = $participant;
            $status = 200;
            $msg = "Participant supprimé avec success.";
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
}
