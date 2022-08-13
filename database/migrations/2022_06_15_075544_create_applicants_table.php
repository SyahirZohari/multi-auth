<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ic');
            $table->date('day_of_birth');
            $table->longText('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('martial_status')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->integer('position_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('applicants', function($table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('position_id')->references('id')->on('positions');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}

