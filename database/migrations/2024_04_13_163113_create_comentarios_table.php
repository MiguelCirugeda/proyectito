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
        Schema::create('comentarios', function (Blueprint $table) {
        $table->id();
        $table->timestamp('fecha_subida')->useCurrent();
        $table->text('texto_comentario');
        $table->unsignedBigInteger('comentario_padre_id')->nullable();
        $table->foreign('comentario_padre_id')->references('id')->on('comentarios')->onDelete('cascade');
        $table->unsignedBigInteger('id_usuario')->nullable();
        $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null'); 
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
        Schema::dropIfExists('comentarios');
    }
};
