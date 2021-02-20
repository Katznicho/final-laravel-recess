<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('patients_list', function (Blueprint $table) {
            $table->bigIncrements('PatientId');
            $table->string('PatientName');
            $table->string('PatientStatus')->default("alive");
            $table->string("OfficerUserName");
            $table->string("Gender");
            $table->string('DOI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('patients_list');
    }
}
