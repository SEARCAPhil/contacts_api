<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactEducationSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('educ_id');
            $table->integer('contact_id');
            $table->string('institution', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('field', 255)->nullable();
            $table->year('grad');
            $table->string('scholarship', 255)->nullable();
            $table->string('type', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('education');
    }
}
