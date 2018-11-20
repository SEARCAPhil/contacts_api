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
            $table->string('affiliateCode', 255);
            $table->string('prefix', 255);
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('middleinit', 255);
            $table->string('nickname', 255);
            $table->string('gender', 255);
            $table->year('birthdate');
            $table->string('spouse', 255);
            $table->string('children', 255);
            $table->string('hobbies', 255);
            $table->string('nationality', 255);
            $table->string('specialization', 255);
            $table->string('officeMobile', 255);
            $table->string('homeMobile', 255);
            $table->string('officePhone', 255);
            $table->string('homePhone', 255);
            $table->string('officeEmail', 255);
            $table->string('homeEmail', 255);
            $table->string('homeAddress', 255);
            $table->string('homeCountry', 255);
            $table->string('officeAddress', 255);
            $table->string('officeCountry', 255);
            $table->string('homeZipCode', 255);
            $table->string('officeZipCode', 255);
            $table->string('officeFax', 255);
            $table->string('homeFax', 255);
            $table->string('officeCountryCode', 255);
            $table->string('homeCountryCode', 255);
            $table->string('officeAreaCode', 255);
            $table->string('homeAreaCode', 255);
            $table->string('status', 255);
            $table->string('civilStat', 255);
            $table->string('position', 255);
            $table->string('dept', 255);
            $table->string('company', 255);
            $table->string('others', 255);
            $table->string('sector', 255);
            $table->string('contactMeans', 255);
            $table->string('mailMeans', 255);
            $table->integer('rank');
            $table->string('suffix', 50);
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
