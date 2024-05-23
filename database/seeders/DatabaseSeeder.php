<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Codigo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $usuario = Usuario::factory()->create();

        // Crea el primer registro con tu código
        Codigo::factory()->create(['codigo' => 'ABCD123', 'estado' => true, 'id_usuario' => $usuario->id]);

        // Crea registros adicionales con códigos aleatorios
        Codigo::factory(15)->create(['estado' => false]);
    }
}
