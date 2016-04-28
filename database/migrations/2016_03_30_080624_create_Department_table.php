<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Depar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Dep_name');
            $table->unsignedInteger('Dep_master')->nullable();
            $table->integer('Dep_Phone');
            $table->string('Dep_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Depar');
    }
}
