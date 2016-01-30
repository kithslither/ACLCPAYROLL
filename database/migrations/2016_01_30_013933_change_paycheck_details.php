<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePaycheckDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paycheck_details', function (Blueprint $table) {
            $table->renameColumn('pay_check_header_id', 'paycheck_header_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paycheck_details', function (Blueprint $table) {
            //
        });
    }
}
