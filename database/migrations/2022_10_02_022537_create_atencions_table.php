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
            $table->text('anamnesis');
            $table->double('peso')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('frecuencia_cardiaca')->nullable();
            $table->double('frecuencia_respiratoria')->nullable();
            $table->text('otros')->nullable();

            $table->foreignId('mascota_id')->constrained('mascotas');
            $table->foreignId('reserva_id')->constrained('reservas');
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
