<?php

namespace App\Http\Controllers;

use App\Models\Coupons_discount;
use App\Http\Requests\StoreCoupons_discountRequest;
use App\Http\Requests\UpdateCoupons_discountRequest;

class CouponsDiscountController extends Controller
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
     * @param  \App\Http\Requests\StoreCoupons_discountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoupons_discountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupons_discount  $coupons_discount
     * @return \Illuminate\Http\Response
     */
    public function show(Coupons_discount $coupons_discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupons_discount  $coupons_discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupons_discount $coupons_discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoupons_discountRequest  $request
     * @param  \App\Models\Coupons_discount  $coupons_discount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoupons_discountRequest $request, Coupons_discount $coupons_discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupons_discount  $coupons_discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupons_discount $coupons_discount)
    {
        //
    }
}
