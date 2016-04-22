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
            $table->string('phone');
            $table->string('mobile');
            $table->string('office');
            $table->string('email');
            $table->string('image');
            $table->string('job_title');
            $table->string('sex');
            $table->string('type');
            $table->string('status');
            $table->bigInteger('wage')->unsigned();
            $table->string('wage_cur')->default('vnđ');
            $table->date('work_from');
            $table->string('adress');
            $table->unsignedInteger('depar_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('depar_id')->references('id')->on('employee');
        });

        DB::statement('ALTER TABLE `Depar` ADD FOREIGN KEY (`Dep_master`)REFERENCES employee(`id`)');
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
