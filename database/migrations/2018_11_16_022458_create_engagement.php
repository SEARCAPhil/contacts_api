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
            $table->date('engageFrom')->nullable();
            $table->date('engageTo')->nullable();
            $table->string('researchId', 255)->nullable();
            $table->string('engagement', 255)->nullable();
            $table->integer('type')->nullable();

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
