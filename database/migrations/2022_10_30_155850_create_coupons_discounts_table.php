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
        Schema::create('coupons_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->double('partner_pct_amount', 10,2)->nullable();
            $table->double('partner_amount_value', 10,2)->nullable();
            $table->double('coat_pct_amount', 10,2)->nullable();
            $table->double('coat_amount_value', 10,2)->nullable();
            $table->enum('coupons_discount_flag', [0,1])->default(0);
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->integer('coupons_quantity')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
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
        Schema::dropIfExists('coupons_discounts');
    }
};
