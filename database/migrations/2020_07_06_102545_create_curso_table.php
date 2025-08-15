<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('CURSOP_Codigo')->nullable();
            $table->bigInteger('INSTP_Codigo')->nullable();
            $table->string('CURSOC_Nombre')->nullable();
            $table->text('CURSOC_Descripcion');
            $table->decimal('CURSOC_Descuento')->default('0.00');
            $table->decimal('CURSOC_Costo')->default('0.00');
            $table->dateTime('CURSOC_FechaInicio', 0)->nullable();
            $table->string('CURSOC_FlagEstado')->default('1');
            $table->string('CURSOC_FechaModificacion')->nullable('1');
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
        Schema::dropIfExists('curso');
    }
}
