<?php

namespace App\Http\Controllers;

use App\Models\medis;
use App\Http\Requests\StoremedisRequest;
use App\Http\Requests\UpdatemedisRequest;

class MedisController extends Controller
{
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
     * @param  \App\Http\Requests\StoremedisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremedisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medis  $medis
     * @return \Illuminate\Http\Response
     */
    public function show(medis $medis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medis  $medis
     * @return \Illuminate\Http\Response
     */
    public function edit(medis $medis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemedisRequest  $request
     * @param  \App\Models\medis  $medis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemedisRequest $request, medis $medis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medis  $medis
     * @return \Illuminate\Http\Response
     */
    public function destroy(medis $medis)
    {
        //
    }
}
