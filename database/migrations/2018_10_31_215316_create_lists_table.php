<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('lista_numero')->nullable();
            $table->text('nombre')->nullable();
            $table->string('cantidad_integrantes')->nullable();
            $table->string('logo')->nullable();
            $table->text('descripcion')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lists');
    }
}
