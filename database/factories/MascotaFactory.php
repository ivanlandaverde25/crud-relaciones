<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(),
            'nombre' => fake()->name(),
            'tipo' => fake()->randomElement(['Perro', 'Gato', 'Perico', 'Garrobo']),
            'edad' => fake()->numberBetween(1, 100),
            'fecha_nacimiento' => fake()->date(),
            'sexo' => fake()->randomElement(['Macho', 'Hembra'])
        ];
    }
}
