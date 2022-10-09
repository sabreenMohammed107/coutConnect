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
        Schema::create('event_instractors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('img', 250)->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->text('bio')->nullable();
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('event_instractors');
    }
};
