<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->text('Universidad_Procedencia')->nullable();
            $table->string('Nombre_Contacto')->nullable();
            $table->string('Correo_Electrónico_Contacto')->nullable();
            $table->string('Celular_Contacto')->nullable();
            $table->string('Tipo_Servicio_Academico')->nullable();
            $table->text('Descripcion_Servicio_Solicitado')->nullable();
            $table->string('SERVICIOAC_Nombre')->nullable();
            $table->text('SERVICIOAC_Descripcion');
            $table->decimal('SERVICIOAC_Descuento')->default('0.00');
            $table->decimal('SERVICIOAC_Costo')->default('0.00');
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
        Schema::dropIfExists('servicio');
    }
}
