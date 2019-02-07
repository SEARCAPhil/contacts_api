<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTrainingSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('training_id');
            $table->integer('contact_id');
            $table->string('title', 255)->nullable();
            $table->integer('saaftype_id')->nullable();
            $table->text('notes')->nullable();
            $table->date('dateStarted')->nullable();
            $table->date('dateEnded')->nullable();
            $table->string('scholarship', 255)->nullable();
            $table->string('venue', 255)->nullable();
            $table->string('sponsor', 255)->nullable();
            $table->string('supervisor', 255)->nullable();
            $table->string('supervisorDesignation', 255)->nullable();
            $table->string('trainingType', 255)->nullable();
            $table->string('organizingAgency', 255)->nullable();
            $table->string('hostUniversity', 255)->nullable();
            $table->integer('isSearcaTraining')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
}
