<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitante', function (Blueprint $table) {
            $table->id();
            $table->string('SOLIC_Nombre')->nullable();
            $table->string('SOLIC_Ruc')->nullable();
            $table->string('SOLIC_Direccion')->nullable();
            $table->string('SOLIC_Telefono')->nullable();
            $table->string('SOLIC_Email')->nullable();
            $table->string('SOLIC_FlagEstado')->nullable();
            $table->string('UBIGP_Codigo')->nullable();
            $table->integer('TIPSOLIP_Codigo')->nullable();
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
        Schema::dropIfExists('solicitante');
    }
}
