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

            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            // $table->float('event_fees', 10, 2)->nullable();
            $table->enum('featured', [0,1])->default(0);
            $table->enum('premium', [0,1])->default(0);
            $table->longText('event_overview')->nullable();
            $table->string('email', 250)->nullable();
            $table->string('ranking', 250)->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('area', 250)->nullable();
            $table->longText('details_address')->nullable();
            $table->longText('google_map')->nullable();
            $table->unsignedBigInteger('event_status_id')->nullable();
            $table->unsignedBigInteger('event_type_id')->nullable();
            $table->text('cover_photo')->nullable();
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
