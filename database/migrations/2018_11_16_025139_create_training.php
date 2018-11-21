<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trainingId', 255);
            $table->string('organizingAgency', 255);
            $table->string('name', 255);
            $table->year('birthDate');
            $table->string('birthPlace', 255);
            $table->string('country', 100);
            $table->string('gender', 50);
            $table->string('civilStatus', 100);
            $table->string('religion', 255);
            $table->string('officeHomeAddress', 255);
            $table->string('contactNumber', 100);
            $table->string('faxNo', 100);
            $table->string('email', 100);
            $table->string('notes', 255);
            $table->string('attachments', 255);
            $table->string('bsDegree', 255);
            $table->year('bsAwardDate');
            $table->string('bsInstitution', 255);
            $table->string('msDegree', 255);
            $table->year('msAwardDate');
            $table->string('msInstitution', 255);
            $table->string('phdDegree', 255);
            $table->year('phdAwardDate');
            $table->string('phdInstitution', 255);
            $table->string('fieldOfSpecialization', 255);
            $table->string('currentPositionTitle', 255);
            $table->string('organization', 255);
            $table->string('immediateSupervisor', 255);
            $table->string('supervisorDesignation', 255);
            $table->string('courseAttended', 255);
            $table->year('dateStarted');
            $table->year('dateEnded');
            $table->string('venue');
            $table->string('sponsor', 255);

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
