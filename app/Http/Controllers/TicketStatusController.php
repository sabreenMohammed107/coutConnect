<?php

namespace App\Http\Controllers;

use App\Models\Ticket_status;
use App\Http\Requests\StoreTicket_statusRequest;
use App\Http\Requests\UpdateTicket_statusRequest;

class TicketStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreTicket_statusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket_status  $ticket_status
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket_status $ticket_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket_status  $ticket_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket_status $ticket_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicket_statusRequest  $request
     * @param  \App\Models\Ticket_status  $ticket_status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicket_statusRequest $request, Ticket_status $ticket_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket_status  $ticket_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket_status $ticket_status)
    {
        //
    }
}
