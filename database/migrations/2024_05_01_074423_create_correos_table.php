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
    Schema::create('correos', function (Blueprint $table) {
        $table->id();
        $table->text('contenido');
        $table->text('asunto');
        $table->unsignedBigInteger('id_usuario_destinatario')->nullable();
        $table->foreign('id_usuario_destinatario')->references('id')->on('usuarios')->onDelete('set null');
        $table->unsignedBigInteger('id_usuario_remitente')->nullable();
        $table->foreign('id_usuario_remitente')->references('id')->on('usuarios')->onDelete('set null');
        $table->enum('estado', ['leido', 'no leido', 'favoritos']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correos');
    }
};
