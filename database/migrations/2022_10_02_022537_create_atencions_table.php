<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->text('anamnesis')->nullable();
            $table->double('peso')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('frecuencia_cardiaca')->nullable();
            $table->double('frecuencia_respiratoria')->nullable();
            $table->text('otros')->nullable();

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('mascota_id');
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
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
        Schema::dropIfExists('atencions');
    }
};
