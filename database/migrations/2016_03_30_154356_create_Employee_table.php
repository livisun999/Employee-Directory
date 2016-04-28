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
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('office')->nullable();
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('job_title');
            $table->string('sex')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('wage')->unsigned();
            $table->string('wage_cur')->default('vnđ');
            $table->date('work_from')->nullable();
            $table->string('adress')->nullable();
            $table->unsignedInteger('depar_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('depar_id')
                ->references('id')
                ->on('employee')
                ->onpUdate('cascade')
                ->onDelete('set null');
        });

        DB::statement('ALTER TABLE `Depar` ADD CONSTRAINT fk_Dep_master FOREIGN KEY (`Dep_master`) REFERENCES employee(`id`) ON UPDATE  CASCADE ON DELETE SET NULL');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `Depar` DROP FOREIGN KEY `fk_Dep_master`');
        Schema::drop('employee');
    }
}