<?php

namespace App\Http\Controllers;

use App\Models\agus;
use App\Http\Requests\StoreagusRequest;
use App\Http\Requests\UpdateagusRequest;

class AgusController extends Controller
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
     * @param  \App\Http\Requests\StoreagusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreagusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agus  $agus
     * @return \Illuminate\Http\Response
     */
    public function show(agus $agus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agus  $agus
     * @return \Illuminate\Http\Response
     */
    public function edit(agus $agus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateagusRequest  $request
     * @param  \App\Models\agus  $agus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateagusRequest $request, agus $agus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agus  $agus
     * @return \Illuminate\Http\Response
     */
    public function destroy(agus $agus)
    {
        //
    }
}
