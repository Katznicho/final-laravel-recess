<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DonorNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('donor_names', function (Blueprint $table) {
            $table->bigIncrements('DonorId');
            $table->string('DonorName');
            $table->string('Amount');
            $table->string("Month");
            $table->string('Date');
            $table->boolean('Displayed')->default(False);
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
        //
    }
}
