<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Editorial;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            "description" => fake()->text(),
            'editorial_id' => Editorial::pluck('id')[fake()->numberBetween(1,Editorial::count()-1)],
            'author_id' => Author::pluck('id')[fake()->numberBetween(1,Author::count()-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
