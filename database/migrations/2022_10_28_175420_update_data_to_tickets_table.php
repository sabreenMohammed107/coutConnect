<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * example
     *  $table->renameColumn('emp_name', 'employee_name');// Renaming "emp_name" to "employee_name"
     *          $table->string('gender',10)->change(); // Change Datatype length
      *         $table->dropColumn('active'); // Remove "active" field
       *        $table->smallInteger('status')->after('email'); // Add "status" column

     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
            $table->text('description')->after('price')->nullable();

            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
};
