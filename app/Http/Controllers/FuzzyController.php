<?php

namespace App\Http\Controllers;

use App\Models\Fuzzy;
use App\Http\Requests\StoreFuzzyRequest;
use App\Http\Requests\UpdateFuzzyRequest;

class FuzzyController extends Controller
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
     * @param  \App\Http\Requests\StoreFuzzyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFuzzyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function show(Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFuzzyRequest  $request
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuzzyRequest $request, Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuzzy $fuzzy)
    {
        //
    }
}
