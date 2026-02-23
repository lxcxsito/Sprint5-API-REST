<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'title' => $this->faker->sentence(),
        'description' => $this->faker->paragraph(),
        'price' => $this->faker->randomFloat(2, 10, 100),
        'urlImage' => 'image.jpg',
        'category_id' => \App\Models\Category::factory(),
    ];
}
}
