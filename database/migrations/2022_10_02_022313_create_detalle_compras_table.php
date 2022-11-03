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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->double('precio');
            $table->integer('cantidad');

            $table->unsignedBigInteger('nota_compra_id')->nullable();
            $table->foreign('nota_compra_id')->references('id')->on('nota_compras')->nullOnDelete();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->nullOnDelete();
            // $table->foreignId('producto_id')->nullable()->constrained('productos')->nullOnDelete();
            // $table->foreignId('nota_compra_id')->onDelete('cascade')->constrained('nota_compras');
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
        Schema::dropIfExists('detalle_compras');
    }
};
