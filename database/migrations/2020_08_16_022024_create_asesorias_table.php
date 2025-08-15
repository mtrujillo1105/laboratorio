<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesorias', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Empresa')->nullable();
            $table->string('Nombre_Contacto')->nullable();
            $table->string('Correo_Electrónico_Contacto')->nullable();
            $table->string('Celular_Contacto')->nullable();
            $table->string('Nombre_Asesoria_Laboratorio')->nullable();
            $table->text('Descripcion_Asesoria')->nullable();
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
        Schema::dropIfExists('asesorias');
    }
}
