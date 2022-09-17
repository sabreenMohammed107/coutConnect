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
        Schema::table('events_medicine_fields', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('medicine_field_id')->references('id')->on('medicine_fields');


        });
        Schema::table('events_categories', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('category_id')->references('id')->on('categories');


        });
        Schema::table('events_specialzations_fees', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('specialize_id')->references('id')->on('specialzations');


        });

        Schema::table('events_tags', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('tag_id')->references('id')->on('tags');


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
