<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagement', function (Blueprint $table) {
            $table->increments('engage_id');
            $table->integer('contact_id');
            $table->year('engageFrom');
            $table->year('engageTo');
            $table->string('researchTitle', 255);
            $table->string('engagement', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engagement');
    }
}
