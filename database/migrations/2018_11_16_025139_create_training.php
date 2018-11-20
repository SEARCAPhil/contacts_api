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
            $table->string('training_id', 255);
            $table->string('organizing_Agency', 255);
            $table->string('name', 255);
            $table->year('birth_ate');
            $table->string('birth_place', 255);
            $table->string('country', 100);
            $table->string('gender', 50);
            $table->string('civil_status', 100);
            $table->string('religion', 255);
            $table->string('office_home_address', 255);
            $table->string('contact_number', 100);
            $table->string('fax_no', 100);
            $table->string('email', 100);
            $table->string('notes', 255);
            $table->string('attachments', 255);
            $table->string('bs_degree', 50);
            $table->year('bs_award_date');
            $table->string('bs_institution', 255);
            $table->string('ms_degree', 255);
            $table->year('ms_award_date');
            $table->string('ms_Institution', 255);
            $table->string('phd_degree', 255);
            $table->year('phd_award_date');
            $table->string('phd_institution', 255);
            $table->string('field_of_specialization', 255);
            $table->string('current_position_title', 255);
            $table->string('organization', 255);
            $table->string('immediate_supervisor', 255);
            $table->string('supervisor_designation', 255);
            $table->string('course_attended', 255);
            $table->year('date_started');
            $table->year('date_ended');
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
