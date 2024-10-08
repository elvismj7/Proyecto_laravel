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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('VentasID');
            $table->unsignedBigInteger('ProductoID');
            $table->integer('cantidad');
            $table->decimal('precio_total', 8, 2);
            $table->dateTime('fecha_venta');
            $table->foreign('ProductoID')
                ->references('ProductoID')
                ->on('productos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
