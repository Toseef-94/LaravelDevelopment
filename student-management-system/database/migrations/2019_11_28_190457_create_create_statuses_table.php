<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_statuses', function (Blueprint $table) {
            $table->increments('status_id');
            $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('create_students');
            $table->foreign('class_id')->references('class_id')->on('create_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_statuses');
    }
}
