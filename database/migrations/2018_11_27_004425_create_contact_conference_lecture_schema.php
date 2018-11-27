<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactConferenceLectureSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conference_id');
            $table->string('paperTitle', 255)->nullable();
            $table->date('dateStarted')->nullable();
            $table->date('dateEnded')->nullable();
            $table->string('lectureVenue', 255)->nullable();
            $table->string('lectureTitle', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture');
    }
}
