<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->boolean('sex');
            $table->date('dob');
            $table->string('100')->nullable();
            $table->string('status');
            $table->string('nationality', 50)->nullable();
            $table->string('national_card', 50)->nullable();
            $table->string('passport', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('village', 50)->nullable();
            $table->string('commune', 50)->nullable();
            $table->string('distric', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('current_address', 100)->nullable();
            $table->date('dateregistered');
            $table->integer('user_id')->unsigned();
            $table->integer('photo')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_students');
    }
}
