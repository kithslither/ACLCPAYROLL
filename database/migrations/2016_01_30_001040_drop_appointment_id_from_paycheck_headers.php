<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAppointmentIdFromPaycheckHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paycheck_headers', function (Blueprint $table) {
            $table->dropColumn('appointment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paycheck_headers', function (Blueprint $table) {
            //
        });
    }
}
