<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_classes', function (Blueprint $table) {
            $table->increments('class_id');
            $table->integer('academic_id')->unsigned();
            $table->integer('lavel_id')->unsigned();
            $table->integer('shift_id')->unsigned();
            $table->integer('time_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('active');
            $table->foreign('academic_id')->references('academic_id')->on('create_academics');
            $table->foreign('lavel_id')->references('lavel_id')->on('create_lavels');
            $table->foreign('shift_id')->references('shift_id')->on('create_shifts');
            $table->foreign('time_id')->references('time_id')->on('create_times');
            $table->foreign('group_id')->references('group_id')->on('create_groups');
            $table->foreign('batch_id')->references('batch_id')->on('create_batches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_classes');
    }
}
