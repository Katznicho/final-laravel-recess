<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HealthOfficers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_officers', function (Blueprint $table) {
            $table->bigIncrements('OfficerId');
            $table->string('OfficerName');
            $table->string("OfficerUserName")->unique();
            $table->string("OfficerRole")->default("officer");
            $table->string("HospitalCategory")->default("general");
            $table->integer("HospitalId");
            $table->string("MonthlySalary")->default("0");
            $table->boolean('IsPromoted')->default(false);
    
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
        Schema::dropIfExists('health_officers');
    }
}
