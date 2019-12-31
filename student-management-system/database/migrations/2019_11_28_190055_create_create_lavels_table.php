<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateLavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_lavels', function (Blueprint $table) {
            $table->increments('lavel_id');
            $table->string('level', 100);
            $table->string('description', 200)->nullable();
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('program_id')->on('create_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_lavels');
    }
}
