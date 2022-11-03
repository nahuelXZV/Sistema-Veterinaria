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
        Schema::create('mascota_vacunas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('observacion')->nullable();
            $table->foreignId('mascota_id')->onDelete('cascade')->constrained('mascotas');
            $table->foreignId('vacuna_id')->onDelete('cascade')->constrained('vacunas');
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
        Schema::dropIfExists('mascota_vacunas');
    }
};
