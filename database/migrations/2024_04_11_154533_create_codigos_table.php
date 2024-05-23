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
        Schema::create('codigos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->boolean('estado')->default(FALSE)->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable(); 
            /* Utilizamos unsignedBigInteger en lugar de unsignedInteger porque el método id() de Laravel, que se utiliza para crear la columna de clave primaria,
             crea por defecto una columna bigInteger. Por lo tanto, para mantener la consistencia y evitar posibles problemas de incompatibilidad de tipos de datos,
            se utiliza unsignedBigInteger para las columnas de claves foráneas que hacen referencia a estas claves primarias. */

            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos');
    }
};
