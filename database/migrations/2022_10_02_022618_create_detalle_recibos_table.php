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
        Schema::create('detalle_recibos', function (Blueprint $table) {
            $table->id();
            $table->double('precio');
            $table->integer('cantidad')->default(1);

            $table->foreignId('recibo_id')->constrained('recibos');
            $table->foreignId('producto_id')->constrained('productos');

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
        Schema::dropIfExists('detalle_recibos');
    }
};
