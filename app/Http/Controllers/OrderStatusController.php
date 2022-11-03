<?php

namespace App\Http\Controllers;

use App\Models\Order_status;
use App\Http\Requests\StoreOrder_statusRequest;
use App\Http\Requests\UpdateOrder_statusRequest;

class OrderStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreOrder_statusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_status  $order_status
     * @return \Illuminate\Http\Response
     */
    public function show(Order_status $order_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_status  $order_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_status $order_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_statusRequest  $request
     * @param  \App\Models\Order_status  $order_status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_statusRequest $request, Order_status $order_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_status  $order_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_status $order_status)
    {
        //
    }
}
