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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('name', 250)->nullable();
            $table->string('img', 250)->nullable();
            $table->text('overview')->nullable();

            $table->string('email', 250)->nullable();
            $table->text('website')->nullable();
            $table->text('fb_account')->nullable();
            $table->text('linkedin_account')->nullable();
            $table->text('twitter_account')->nullable();
            $table->text('youtube_account')->nullable();
            $table->string('licence_file', 250)->nullable();
            $table->string('bussiness_field', 250)->nullable();
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
        Schema::dropIfExists('organizers');
    }
};
