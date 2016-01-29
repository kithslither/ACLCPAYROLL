<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaycheckDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paycheck_details', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 19, 2);
            $table->integer('pay_type_id');
            $table->integer('pay_check_header_id');
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
        Schema::drop('paycheck_details');
    }
}
