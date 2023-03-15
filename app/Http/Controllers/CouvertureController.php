<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouvertureRequest;
use App\Models\Couverture;
use Illuminate\Http\Request;

class CouvertureController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Couverture::class, 'couverture');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couvertures = Couverture::all();
        return response()->json([
            'couvertures' => $couvertures,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouvertureRequest $request)
    {
        $couverture = new Couverture;
        $couverture->couverture_nom = $request->couverture_nom;
        if ($couverture->save()) {
            $result = $couverture;
            $status = 200;
            $msg = "Couverture médicale ajoutée avec success.";
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
     * @param  \App\Models\Couverture  $couverture
     * @return \Illuminate\Http\Response
     */
    public function show(Couverture $couverture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Couverture  $couverture
     * @return \Illuminate\Http\Response
     */
    public function edit(Couverture $couverture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Couverture  $couverture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couverture $couverture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Couverture  $couverture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couverture $couverture)
    {
        //
    }
}
