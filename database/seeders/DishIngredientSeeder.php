<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Ingredient;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = Dish::all();
        $ingredients = Ingredient::all();
        foreach ($dishes as $dish) {
        if ($dish->ingredients()->exists()) { 
            continue; 
    }
        $numIngredients = rand(1, 5); 
        $selectedIngredients = $ingredients->random($numIngredients);
        foreach ($selectedIngredients as $ingredient) {
            $dish->ingredients()->attach($ingredient->id, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
    }
}
    
    }
}
