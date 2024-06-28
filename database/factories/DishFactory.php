<?php

namespace Database\Factories;

use App\Models\Difficulty;
use App\Models\Price;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageId = fake()->numberBetween(1, 1000);

        $posterUrl = "https://picsum.photos/id/{$imageId}/400/600";
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'difficulty_id' => function () {
            return Difficulty::inRandomOrder()->first()->id; 
        },
            'region_id' => function () {
            return Region::inRandomOrder()->first()->id; 
        },
        'preparation_min' => fake()->numberBetween(5, 100),
        'cooking_min' => fake()->numberBetween(5, 100),
        'price_id' => function () {
            return Price::inRandomOrder()->first()->id; 
        },
        'poster' => $posterUrl
        ];
    
    }
}
