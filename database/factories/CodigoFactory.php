<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Codigo>
 */
class CodigoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->regexify('[A-Z0-9]{5}'), //con regexify generamos una cadena sin caracteres especiales
            'estado' => $this->faker->boolean,
            'id_usuario' => null,
        ];
    }
}
