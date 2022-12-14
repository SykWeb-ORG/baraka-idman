<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammeRequest;
use App\Models\Place;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $programme->programme_type = $request->programme_type;
        if ($programme->save()) {
            if ($request->has('places')) {
                $places = collect([]);
                foreach($request->places as $place)
                {
                    $new_place = new Place([
                        'lieu' => $place['lieu'],
                        'programme_date' => $place['programme_date'],
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
        $programme->programme_type = $request->programme_type;
        if ($programme->update()) {
            if ($request->has('places')) {
                $programme->places()->delete();
                $places = collect([]);
                foreach($request->places as $place)
                {
                    $new_place = new Place([
                        'lieu' => $place['lieu'],
                        'programme_date' => $place['programme_date'],
                    ]);
                    $places->push($new_place);
                }
                $programme->places()->saveMany($places->all());
                $programme->refresh();
            }
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
        
    }
}
