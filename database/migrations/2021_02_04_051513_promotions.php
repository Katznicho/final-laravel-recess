<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promotions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('PromotionsId');
            $table->string("OfficerId");
            $table->string("OfficerUserName");
            $table->string("Pending")->default("no");
            $table->string('Award');
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
        Schema::dropIfExists('promotions');
           
    }
}
