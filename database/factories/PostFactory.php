<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->word(),
            'categoria' => fake()->randomElement(['Desarrollo','UX/UI']),
            'contenido' => fake()->sentence(1000),
            'publicado' => fake()->randomElement([true, false]),
            'fecha_publicacion' => fake()->optional(60)->date(),
            'slug' => fake()->slug(),
        ];
    }
}
