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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->nullable();
            $table->unsignedBigInteger('order_status_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('phone', 250)->nullable();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->double('booked_quantity', 8,2)->nullable();
            $table->unsignedBigInteger('copoun_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->double('ticket_net_fees', 8,2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
