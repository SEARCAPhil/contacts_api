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
            $table->string('spouse', 255)->nullable();
            $table->string('children', 255)->nullable();
            $table->string('hobbies', 255)->nullable();
            $table->string('nationality', 255)->nullable();
            $table->string('specialization', 255)->nullable();
            $table->string('officeMobile', 255)->nullable();
            $table->string('homeMobile', 255)->nullable();
            $table->string('officePhone', 255)->nullable();
            $table->string('homePhone', 255)->nullable();
            $table->string('officeEmail', 255)->nullable();
            $table->string('homeEmail', 255)->nullable();
            $table->string('homeAddress', 255)->nullable();
            $table->string('homeCountry', 255)->nullable();
            $table->string('officeAddress', 255)->nullable();
            $table->string('officeCountry', 255)->nullable();
            $table->string('homeZipCode', 255)->nullable();
            $table->string('officeZipCode', 255)->nullable();
            $table->string('officeFax', 255)->nullable();
            $table->string('homeFax', 255)->nullable();
            $table->string('officeCountryCode', 255)->nullable();
            $table->string('homeCountryCode', 255)->nullable();
            $table->string('officeAreaCode', 255)->nullable();
            $table->string('homeAreaCode', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('civilStat', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('dept', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('others', 255)->nullable();
            $table->string('sector', 255)->nullable();
            $table->string('contactMeans', 255)->nullable();
            $table->string('mailMeans', 255)->nullable();
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
