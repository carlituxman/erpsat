<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasPaises extends Migration {

	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_paises', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('codigo', 45);
            $table->string('nombre', 45);
            $table->string('continente', 45);
            $table->string('codigo_moneda', 45);
            $table->string('nombre_moneda', 45);
        });

        Schema::create('base_estados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('pais_id')->unsigned();
            $table->string('nombre', 45);
            $table->string('zona_horaria', 45);

            $table->foreign('pais_id')
              ->references('id')->on('base_paises')
              ->onDelete('restrict');
        });

        Schema::create('base_provincias', function($table)
        {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            $table->string('nombre',24);

            $table->foreign('estado_id')
              ->references('id')->on('base_estados')
              ->onDelete('restrict');

        });

        Schema::create('base_municipios', function($table)
        {
            $table->increments('id');
            $table->integer('provincia_id')->unsigned();
            $table->string('nombre',60);
            $table->integer('codigo')->unsigned();
            $table->smallInteger('dc');

            $table->foreign('provincia_id')
              ->references('id')->on('base_provincias')
              ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('base_municipios');
        Schema::drop('base_provincias');
        Schema::drop('base_estados');
        Schema::drop('base_paises');
    }


}
