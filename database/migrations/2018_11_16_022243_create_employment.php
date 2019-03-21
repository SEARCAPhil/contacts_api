<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment', function (Blueprint $table) {
            $table->increments('employ_id');
            $table->integer('contact_id');
            $table->string('companyName', 255)->nullable();
            $table->string('companyAddress', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->year('employedFrom')->nullable();
            $table->year('employedTo')->nullable();
            $table->string('country', 255)->nullable();
            $table->integer('countryCode')->nullable();
            $table->integer('zip')->nullable();
            $table->string('supervisor', 255)->nullable();
            $table->string('supervisorDesignation', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('areaCode', 255)->nullable();
            $table->string('sector', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment');
    }
}
