<?php

namespace App\Http\Controllers;

use App\Models\Organizer_status;
use App\Http\Requests\StoreOrganizer_statusRequest;
use App\Http\Requests\UpdateOrganizer_statusRequest;

class OrganizerStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreOrganizer_statusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizer_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer_status  $organizer_status
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer_status $organizer_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer_status  $organizer_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer_status $organizer_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizer_statusRequest  $request
     * @param  \App\Models\Organizer_status  $organizer_status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizer_statusRequest $request, Organizer_status $organizer_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer_status  $organizer_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer_status $organizer_status)
    {
        //
    }
}
