<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammeRequest;
use App\Models\Partenaire;
use App\Models\Place;
use App\Models\Programme;
use App\Models\ProgrammeType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProgrammeController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Programme::class, 'programme');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::all();
        return response()->json(
            [
                'programmes' => $programmes,
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProgrammeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgrammeRequest $request)
    {
        $programme = new Programme;
        $programme->programme_nom = $request->programme_nom;
        $request->whenFilled('programme_type', function ($input) use ($programme) {
            if ($programme_type = ProgrammeType::find($input)) {
                $programme_type->programmes()->save($programme);
            }
        });
        $request->whenFilled('partenaire', function ($input) use ($programme) {
            if ($partenaire = Partenaire::find($input)) {
                $partenaire->programmes()->save($programme);
            }
        });
        if ($programme->save()) {
            if ($request->has('places')) {
                $places = collect([]);
                foreach($request->places as $place)
                {
                    $new_place = new Place([
                        'lieu' => $place['lieu'],
                        'programme_date' => $place['programme_date'],
                        'programme_resultat' => $place['programme_resultat'],
                    ]);
                    $places->push($new_place);
                }
                $programme->places()->saveMany($places->all());
                $programme->refresh();
            }
            $result = $programme;
            $status = 200;
            $msg = "Programme ajouté avec success.";
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
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProgrammeRequest  $request
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(ProgrammeRequest $request, Programme $programme)
    {
        $programme->programme_nom = $request->programme_nom;
        $request->whenFilled('programme_type', function ($input) use ($programme) {
            if ($programme_type = ProgrammeType::find($input)) {
                $programme_type->programmes()->save($programme);
            }
        });
        $request->whenFilled('partenaire', function ($input) use ($programme) {
            if ($partenaire = Partenaire::find($input)) {
                $partenaire->programmes()->save($programme);
            }
        });
        if ($programme->update()) {
            $result = $programme;
            $status = 200;
            $msg = "Programme modifié avec success.";
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
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        if ($programme->delete()) {
            $result = $programme;
            $status = 200;
            $msg = "Programme supprimé avec success.";
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
