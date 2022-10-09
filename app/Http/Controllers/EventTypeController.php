<?php

namespace App\Http\Controllers;

use App\Models\Event_type;
use App\Http\Requests\StoreEvent_typeRequest;
use App\Http\Requests\UpdateEvent_typeRequest;

class EventTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_typeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function show(Event_type $event_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_type $event_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_typeRequest  $request
     * @param  \App\Models\Event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_typeRequest $request, Event_type $event_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_type $event_type)
    {
        //
    }
}
