<?php

namespace App\Http\Controllers;

use App\Models\ComentLike;
use App\Http\Requests\StoreComentLikeRequest;
use App\Http\Requests\UpdateComentLikeRequest;

class ComentLikeController extends Controller
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
     * @param  \App\Http\Requests\StoreComentLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComentLike  $comentLike
     * @return \Illuminate\Http\Response
     */
    public function show(ComentLike $comentLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComentLike  $comentLike
     * @return \Illuminate\Http\Response
     */
    public function edit(ComentLike $comentLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentLikeRequest  $request
     * @param  \App\Models\ComentLike  $comentLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentLikeRequest $request, ComentLike $comentLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComentLike  $comentLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComentLike $comentLike)
    {
        //
    }
}
