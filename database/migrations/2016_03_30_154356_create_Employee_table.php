<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('birthday');
            $table->integer('phone');
            $table->string('email');
            $table->string('image');
            $table->string('job_title');
            $table->unsignedInteger('depar_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('depar_id')->references('id')->on('Depar');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee');

    }
}
