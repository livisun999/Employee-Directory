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
            $table->string('Dep_master');
            $table->integer('Dep_Phone');
            $table->tinyInteger('Dep_number');
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
