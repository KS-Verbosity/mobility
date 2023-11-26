<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBikeStatusRequest;
use App\Http\Requests\UpdateBikeStatusRequest;
use App\Models\BikeStatus;

class BikeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBikeStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BikeStatus $bikeStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BikeStatus $bikeStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBikeStatusRequest $request, BikeStatus $bikeStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BikeStatus $bikeStatus)
    {
        //
    }
}
