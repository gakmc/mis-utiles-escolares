<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->Increments('id_producto');
            $table->string('codigo_barra')->unique();
            $table->string('codigo_qr')->unique();
            $table->string('nombre_producto');
            $table->string('imagen_producto')->nullable();
            $table->unsignedInteger('lote_id');
            $table->unsignedInteger('tipo_producto_id');
            $table->foreign('tipo_producto_id')->references('id_tipo_producto')->on('tipos_productos')->onUpdate('cascade')->onDelete('cascade');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
