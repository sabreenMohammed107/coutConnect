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
        Schema::create('event_days', function (Blueprint $table) {
            $table->id();
            $table->date('event_date_from')->nullable();
            $table->date('event_date_to')->nullable();
            $table->time('event_time_from', $precision = 0)->nullable();
            $table->time('event_time_to', $precision = 0)->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
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
        Schema::dropIfExists('event_days');
    }
};
