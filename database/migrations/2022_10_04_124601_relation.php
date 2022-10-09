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

        Schema::table('specialzations', function (Blueprint $table) {

            $table->foreign('medicine_field_id')->references('id')->on('medicine_fields');


        });

        Schema::table('events_specialzations', function (Blueprint $table) {
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

            $table->foreign('event_type_id')->references('id')->on('event_types');
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


        Schema::table('organizers', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('status_id')->references('id')->on('organizer_statuses');


        });
        Schema::table('organizer_phones', function (Blueprint $table) {
            $table->foreign('organizer_id')->references('id')->on('organizers');


        });


        Schema::table('doctors', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('register_type_id')->references('id')->on('register_types');


        });
        Schema::table('doctor_phones', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');


        });

        Schema::table('doctor_medical_fields', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('medicine_field_id')->references('id')->on('medicine_fields');


        });


        Schema::table('event_galleries', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');

        });

        Schema::table('event_faqs', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('doctor_id')->references('id')->on('doctors');

        });


        Schema::table('event_instractors', function (Blueprint $table) {
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
