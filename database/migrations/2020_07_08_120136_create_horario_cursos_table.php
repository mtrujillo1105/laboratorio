<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso')->nullable();
            $table->date('fecha_inicial')->nullable();
/*             $table->date('fecha_final')->nullable();
            $table->integer('hora_inicial')->nullable();
            $table->integer('hora_final')->nullable(); */
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
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
        Schema::dropIfExists('horario_cursos');
    }
}
