<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('appointment_begin_date');
            $table->dateTime('appointment_end_date');
            $table->integer('employee_id');
            $table->integer('title_id');
            $table->integer('department_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
    }
}
