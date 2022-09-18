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

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('organizer_id')->references('id')->on('organizers');


        });

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

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');



        });
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('organizer_id')->references('id')->on('organizers');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('event_status_id')->references('id')->on('event_statuses');


        });


        Schema::table('event_days', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');



        });


        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('status_id')->references('id')->on('ticket_statuses');

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('doctor_id')->references('id')->on('doctors');


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
