<?php

namespace App\Http\Controllers;

use App\Models\Event_status;
use App\Http\Requests\StoreEvent_statusRequest;
use App\Http\Requests\UpdateEvent_statusRequest;

class EventStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_statusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_status  $event_status
     * @return \Illuminate\Http\Response
     */
    public function show(Event_status $event_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_status  $event_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_status $event_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_statusRequest  $request
     * @param  \App\Models\Event_status  $event_status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_statusRequest $request, Event_status $event_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_status  $event_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_status $event_status)
    {
        //
    }
}
