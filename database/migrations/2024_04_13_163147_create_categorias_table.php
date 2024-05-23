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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['software', 'hardware', 'redes', 'sistemas', 'otros']);
            $table->text('descripcion');
            $table->unsignedBigInteger('id_incidencia')->nullable();
            $table->foreign('id_incidencia')->references('id')->on('incidencias')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
