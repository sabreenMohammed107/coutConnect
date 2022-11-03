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
        Schema::create('topics_lectures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('link', 250)->nullable();
            $table->string('lecture_title', 250)->nullable();
            $table->string('lecture_link', 250)->nullable();
            $table->integer('lecture_duration')->nullable();

            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
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
        Schema::dropIfExists('topics_lectures');
    }
};
