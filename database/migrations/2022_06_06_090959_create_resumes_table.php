<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->longText('about_me')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('education')->nullable();
            $table->string('cpre_status')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('cpre_doc')->nullable();
            $table->integer('student_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('resumes', function($table) {
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}