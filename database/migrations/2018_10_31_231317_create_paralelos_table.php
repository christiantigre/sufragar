<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParalelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paralelos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('paralelo')->nullable();
            $table->boolean('activo')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paralelos');
    }
}
