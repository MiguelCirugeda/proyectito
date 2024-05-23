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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha')->useCurrent();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['no resuelta', 'en proceso', 'resuelta']);
            $table->enum('prioridad', ['prioridad alta', 'prioridad media', 'prioridad baja']);
            $table->unsignedBigInteger('usuario_resuelve_id')->nullable(); 
            $table->foreign('usuario_resuelve_id')->references('id')->on('usuarios')->onDelete('set null'); 

            //Aqui almacenamos el id del usuario que subio la incidencia
            $table->unsignedBigInteger('usuario_subio_id')->nullable(); 
            $table->foreign('usuario_subio_id')->references('id')->on('usuarios')->onDelete('set null'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
