<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactResearchSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->increments('research_id');
            $table->integer('contact_id');
            $table->integer('saaftype_id')->nullable();;
            $table->year('dateStarted');
            $table->year('dateEnded');
            $table->string('title', 255);
            $table->string('fieldStudy', 255)->nullable();
            $table->string('funding', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->string('hostUniversity', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research');
    }
}
