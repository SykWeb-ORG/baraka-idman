<?php

namespace App\Http\Controllers;

use App\Models\MedicaleVisite;
use App\Http\Requests\MedicaleVisiteRequest;

class MedicaleVisiteController extends Controller
{
    public function __construct() {
        $this->authorizeResource(MedicaleVisite::class, 'medicaleVisite');
    }

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
     * @param  \App\Http\Requests\MedicaleVisiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicaleVisiteRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function show(MedicaleVisite $medicaleVisite)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicaleVisite $medicaleVisite)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MedicaleVisiteRequest  $request
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function update(MedicaleVisiteRequest $request, MedicaleVisite $medicaleVisite)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicaleVisite $medicaleVisite)
    {
        
    }
}
