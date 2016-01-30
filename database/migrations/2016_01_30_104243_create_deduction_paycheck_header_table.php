<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeductionPaycheckHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deduction_paycheck_header', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deduction_id');
            $table->integer('paycheck_header_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deduction_paycheck_header', function (Blueprint $table) {
            //
        });
    }
}
