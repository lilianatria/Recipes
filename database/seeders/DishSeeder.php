<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Price;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::factory()->count(20)->create(); 
        Difficulty::factory()->count(3)->create(); 
        Price::factory()->count(3)->create(); 
        Ingredient::factory()->count(50)->create();
        Dish::factory()->count(20)->create();
        $this->call(DishIngredientSeeder::class);
    }
}
