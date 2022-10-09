<?php

namespace App\Http\Controllers;

use App\Models\Event_gallery;
use App\Http\Requests\StoreEvent_galleryRequest;
use App\Http\Requests\UpdateEvent_galleryRequest;

class EventGalleryController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_galleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_galleryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_gallery  $event_gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Event_gallery $event_gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_gallery  $event_gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_gallery $event_gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_galleryRequest  $request
     * @param  \App\Models\Event_gallery  $event_gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_galleryRequest $request, Event_gallery $event_gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_gallery  $event_gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_gallery $event_gallery)
    {
        //
    }
}
