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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->date('event_date_form')->nullable();
            $table->date('event_date_to')->nullable();

            $table->time('event_time_form', $precision = 0)->nullable();
            $table->time('event_time_to', $precision = 0)->nullable();
            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->float('event_fees', 10, 2)->nullable();
            $table->enum('featured', [0,1])->default(0);
            $table->enum('premium', [0,1])->default(0);
            $table->longText('event_overview')->nullable();
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
        Schema::dropIfExists('events');
    }
};
