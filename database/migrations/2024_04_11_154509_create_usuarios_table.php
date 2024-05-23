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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('categoria_usuario', ['diseñador', 'programador', 'sistema', 'direccion']);
            $table->enum('tipo_tecnico', ['tecnico de software', 'tecnico de hardware', 'tecnico de redes', 'tecnico de sistemas', 'direccion'])->nullable();
            $table->string('password');
            $table->boolean('esTecnico')->default(FALSE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
