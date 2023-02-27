<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use App\Models\Participant;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Formation::class, 'formation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return response()->json([
            'formations' => $formations,
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
     * @param  \App\Http\Requests\FormationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {
        $formation = new Formation;
        $formation->formation_titre = $request->formation_titre;
        $formation->formation_date = $request->formation_date;
        $formation->formation_heure = $request->formation_heure;
        $formation->formation_duree = $request->formation_duree;
        $formation->organisme = $request->organisme;
        $formation->formateur = $request->formateur;
        $formation->objet = $request->objet;
        if ($formation->save()) {
            if ($request->has('participants')) {
                $participants = collect([]);
                foreach($request->participants as $participant)
                {
                    $new_participant = new Participant([
                        'participant_nom' => $participant['participant_nom'],
                        'participant_prenom' => $participant['participant_prenom'],
                        'participant_cin' => $participant['participant_cin'],
                        'participant_tele' => $participant['participant_tele'],
                    ]);
                    $participants->push($new_participant);
                }
                $formation->participants()->saveMany($participants->all());
                $formation->refresh();
            }
            $result = $formation;
            $status = 200;
            $msg = "Formation ajoutée avec success.";
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
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FormationRequest  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(FormationRequest $request, Formation $formation)
    {
        $formation->formation_titre = $request->formation_titre;
        $formation->formation_date = $request->formation_date;
        $formation->formation_heure = $request->formation_heure;
        $formation->formation_duree = $request->formation_duree;
        $formation->organisme = $request->organisme;
        $formation->formateur = $request->formateur;
        $formation->objet = $request->objet;
        if ($formation->update()) {
            $result = $formation;
            $status = 200;
            $msg = "Formation modifié avec success.";
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
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        if ($formation->delete()) {
            $result = $formation;
            $status = 200;
            $msg = "Formation supprimé avec success.";
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
