<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduateAff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradaff', function (Blueprint $table) {
            $table->increments('gradaff_id');
            $table->integer('contact_id');
            $table->integer('saaftype_id');
            $table->string('hostUniv', 255);
            $table->string('fieldStudy', 255);
            $table->string('thesisTitle', 255);
            $table->year('yearStart');
            $table->year('yearComplete');
            $table->string('funding', 255);
            $table->string('remarks', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gradaff');
    }
}
