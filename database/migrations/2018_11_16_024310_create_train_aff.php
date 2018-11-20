<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainAff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainaff', function (Blueprint $table) {
            $table->increments('trainaff_id');
            $table->integer('contact_id');
            $table->integer('saaftype_id');
            $table->string('trainingTitle', 255);
            $table->year('dateTrain');
            $table->string('venueTrain', 255);
            $table->string('hostUniv', 255);
            $table->year('yearStart');
            $table->year('yearComplete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainaff');
    }
}
