<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('affiliateCode', 255)->nullable();
            $table->string('prefix', 255)->nullable();
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('middleinit', 255)->nullable();
            $table->string('nickname', 255)->nullable();
            $table->string('gender', 255);
            $table->date('birthdate');
            $table->string('spouse', 255)->nullable();
            $table->string('children', 255)->nullable();
            $table->string('hobbies', 255)->nullable();
            $table->string('nationality', 255)->nullable();
            $table->string('specialization', 255)->nullable();
            
            $table->string('homeAddress', 255)->nullable();
            $table->string('homeCountry', 255)->nullable();
            
            $table->string('homeZipCode', 255)->nullable();
            $table->string('homeCountryCode', 255)->nullable();
            $table->string('homeAreaCode', 255)->nullable();
            $table->string('civilStat', 255)->nullable();
            $table->string('others', 255)->nullable();
            $table->integer('rank')->nullable();
            $table->string('suffix', 50)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
