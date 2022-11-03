<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('copoun_id')->references('id')->on('coupons_discounts');
            $table->foreign('discount_id')->references('id')->on('coupons_discounts');


        });


        Schema::table('coupons_discounts', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('status_id')->references('id')->on('coupons_discounts_statuses');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
