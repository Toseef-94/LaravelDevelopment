<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_fees', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('academic_id')->unsigned();
            $table->integer('lavel_id')->unsigned();
            $table->integer('fee_type_id')->unsigned();
            $table->string('fee_heading', 100)->nullable();
            $table->float('amount', 8, 2);
            $table->foreign('academic_id')->references('academic_id')->on('create_academics');
            $table->foreign('lavel_id')->references('lavel_id')->on('create_lavels');
            $table->foreign('fee_type_id')->references('fee_type_id')->on('create_feetypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_fees');
    }
}
