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
        //
        Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('event_id')->references('id')->on('events');


        });


        Schema::table('topics_lectures', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics_lectures');
            $table->foreign('event_id')->references('id')->on('events');


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
