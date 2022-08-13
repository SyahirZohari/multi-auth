<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position_name');
            $table->string('position_desc')->nullable();
            $table->string('position_salary')->nullable();
            $table->string('position_department')->nullable();
            $table->integer('industry_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('positions', function($table) {
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}