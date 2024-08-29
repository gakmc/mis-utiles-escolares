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
        Schema::create('inventario', function (Blueprint $table) {
            $table->Increments('id_inventario');
            $table->unsignedInteger('id_producto');
            $table->unsignedInteger('id_sucursal');
            $table->integer('numero_estante');
            $table->integer('cantidad_piezas');
            $table->integer('cantidad_empaques');
            $table->integer('piezas_por_empaque');
            $table->integer('total_piezas')->virtualAs('cantidad_piezas + (cantidad_empaques * piezas_por_empaque)');
            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_sucursal')->references('id_sucursal')->on('sucursales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
