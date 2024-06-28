<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Price;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class DishController extends Controller
{
    private function validateDishData(Request $request)     {
        return $request->validate([
            'name' => 'required|string|max:255',            
            'region_id' => 'required|exists:regions,id',
            'difficulty_id' => 'required|exists:difficulties,id',
            'price_id' => 'required|exists:prices,id',
            'ingredients' => 'required|array',            
            'ingredients.*' => 'exists:ingredients,id',  
            'cooking_min' => 'required|integer|min:0|max:45',  
            'preparation_min' => 'required|integer|min:10|max:60',         
            'description' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                   
        ]);    
}
    public function index(Request $request)
    {
        // $dishes = Dish::orderBy('name')->paginate(10);

        $sorting_options = [
            'name_asc' => ['name', 'asc'],
            'name_desc' => ['name', 'desc'],
            'preparation_asc' => ['preparation_min', 'asc'],
            'preparation_desc' => ['preparation_min', 'desc'],
            
        ];

        

        $default_sorting = ['name', 'asc'];
        $sort = $request->input('sort');

        $orderBy =  $sorting_options[$sort] ?? $default_sorting;
        $dishes = Dish::orderBy($orderBy[0], $orderBy[1])->paginate(8);
        
        return view('admin.dishes.index', compact('dishes','sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        
        $regions = Region::all();
        
        $difficulties = Difficulty::all();

        $prices = Price::all();

       
        return view('admin.dishes.create', compact('ingredients', 'regions', 'prices','difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateDishData($request);
        
        $dish = new Dish();
        
        $dish->fill($validateData);

        
        if($request->hasFile('poster')){
            $fileName = time() . '_' .$request->file('poster')->getClientOriginalName();
           
            $request->file('poster')->storeAs('posters', $fileName, 'public');
            
            $dish->poster = 'posters/'.$fileName;

            // $posterPath =Storage::putFileAs('posters',$request->file('poster'), $fileName);
           
            
        } else {
            // $dish->poster = storage_path('posters/default.jpg');
            
            $dish->poster ='default/default.png';    
        }

        if($dish->save()){
            $dish->ingredients()->attach($validateData['ingredients']);
            
        }

        return redirect()->route('dishes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::findOrFail($id);
         
        
         
         $regions = Region::all();

         $difficulties = Difficulty::all();

         $prices = Price::all();
        
         $ingredients = Ingredient::all();


         
         return view('admin.dishes.edit', compact('dish', 'regions', 'ingredients','prices', 'difficulties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $this->validateDishData($request);
        $dish = Dish::findOrFail($id);
        $dish->fill($validateData);

        if($request->hasFile('poster')){
          
        $fileName = time() . '_' .$request->file('poster')->getClientOriginalName();
       
        $posterPath = $request->file('poster')->storeAs('posters', $fileName, 'public');
        
        $dish->poster = $posterPath;
        }

        if($dish->save()){
            $dish->ingredients()->sync($validateData['ingredients']);
           
        }

        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::find($id);
        if (!$dish) {
            return redirect()->route('dishes.index')->with('error', 'ricetta non presente');
        }

        // dd(asset('storage/'.$dish->poster));
        Storage::disk('public')->delete($dish->poster);
        

        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'ricetta eliminata');
    }
    
}
