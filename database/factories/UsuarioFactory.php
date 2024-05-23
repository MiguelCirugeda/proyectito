<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'categoria_usuario' => $this->faker->randomElement(['diseñador', 'programador', 'sistema', 'direccion']),
            'tipo_tecnico' => 'direccion',
            'password' => Hash::make('123456'),
            'esTecnico' => true,
            
        ];
    }
}
