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
            $table->string('lastname', 255)->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('middleinit', 255)->nullable();
            $table->string('nickname', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->date('birthdate')->nullable();
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
            $table->string('photo',255)->nullable();
            $table->string('fullname', 255)->nullable()->comment('There are no clear separation between surname and given name from old DB, thus, it will be stored in a common field instead');
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
