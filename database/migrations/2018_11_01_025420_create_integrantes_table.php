<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_alumno')->nullable();
            $table->string('apellido_alumno')->nullable();
            $table->string('foto')->nullable();            
            //$table->string('cargo')->nullable();
            //$table->string('curso')->nullable();
            //$table->string('paralelo')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('lists');            
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');          
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('courses');          
            $table->integer('paralelo_id')->unsigned();
            $table->foreign('paralelo_id')->references('id')->on('paralelos');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('integrantes');
    }
}


