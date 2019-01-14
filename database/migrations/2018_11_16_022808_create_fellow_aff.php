<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFellowAff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowaff', function (Blueprint $table) {
            $table->increments('fellowaff_id');
            $table->integer('contact_id');
            $table->integer('saaftype_id')->nullable();
            $table->date('dateFrom');
            $table->date('dateTo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fellowaff');
    }
}
