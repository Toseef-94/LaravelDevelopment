<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateStudentfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_studentfees', function (Blueprint $table) {
            $table->increments('s_fee_id');
            $table->integer('fee_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('lavel_id')->unsigned();
            $table->float('amount');
            $table->foreign('fee_id')->references('fee_id')->on('create_fees');
            $table->foreign('student_id')->references('student_id')->on('create_students');
            $table->foreign('lavel_id')->references('lavel_id')->on('create_lavels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_studentfees');
    }
}
