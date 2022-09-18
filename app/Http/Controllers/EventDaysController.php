<?php

namespace App\Http\Controllers;

use App\Models\Event_days;
use App\Http\Requests\StoreEvent_daysRequest;
use App\Http\Requests\UpdateEvent_daysRequest;

class EventDaysController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_daysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_daysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_days  $event_days
     * @return \Illuminate\Http\Response
     */
    public function show(Event_days $event_days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_days  $event_days
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_days $event_days)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_daysRequest  $request
     * @param  \App\Models\Event_days  $event_days
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_daysRequest $request, Event_days $event_days)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_days  $event_days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_days $event_days)
    {
        //
    }
}
