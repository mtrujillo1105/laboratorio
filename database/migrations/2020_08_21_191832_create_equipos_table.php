<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Equipo')->nullable();
            $table->string('Descripcion_Equipo')->nullable();
            $table->integer('Cantidad')->nullable();
            $table->string('Fabricante')->nullable();
            $table->string('Descripcion_Ficha_Tecnica_Equipo')->nullable();
            $table->string('URL_Ficha_Tecnica_Equipo')->nullable();
            $table->string('Archivo_Descripcion_Equipo')->nullable();
            $table->string('Estado_Ficha_Tecnica_Equipo')->nullable();
            $table->decimal('Costo')->nullable();

            $table->unsignedBigInteger('equipos_id')->nullable();
            $table->foreign('equipos_id')->references('id')->on('solicitante');

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
        Schema::dropIfExists('equipos');
    }
}
