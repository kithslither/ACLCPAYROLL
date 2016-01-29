<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaycheckHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paycheck_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_paid');
            $table->date('pay_period_begin_date');
            $table->date('pay_period_end_date');
            $table->integer('appointment_id');
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
        Schema::drop('paycheck_headers');
    }
}
