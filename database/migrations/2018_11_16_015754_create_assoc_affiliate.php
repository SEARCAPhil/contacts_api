<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocAffiliate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assocaff', function (Blueprint $table) {
            $table->increments('assocaff_id');
            $table->integer('contact_id');
            $table->integer('saaftype_id');
            $table->string('researchTitle', 255);
            $table->year('yearStart');
            $table->year('yearComplete');
            $table->string('paperTitle', 255);
            $table->string('confTitle', 255);
            $table->year('dateConf');
            $table->string('venueConf', 255);
            $table->string('lectureTitle', 255);
            $table->year('dateLect');
            $table->string('venueLect', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assocaff');
    }
}
