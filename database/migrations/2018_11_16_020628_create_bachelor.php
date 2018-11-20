<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBachelor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bachelor', function (Blueprint $table) {
            $table->increments('bs_id');
            $table->integer('contact_id');
            $table->string('bsInstitute', 255);
            $table->string('bsCountry', 255);
            $table->string('bsField', 255);
            $table->year('bsGrad');
            $table->string('bsScholarship', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bachelor');
    }
}
