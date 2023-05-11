<?php

namespace App\Http\Controllers;

use App\Models\Fahp;
use App\Http\Requests\StoreFahpRequest;
use App\Http\Requests\UpdateFahpRequest;

class FahpController extends Controller
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
     * @param  \App\Http\Requests\StoreFahpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFahpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fahp  $fahp
     * @return \Illuminate\Http\Response
     */
    public function show(Fahp $fahp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fahp  $fahp
     * @return \Illuminate\Http\Response
     */
    public function edit(Fahp $fahp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFahpRequest  $request
     * @param  \App\Models\Fahp  $fahp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFahpRequest $request, Fahp $fahp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fahp  $fahp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fahp $fahp)
    {
        //
    }
}
