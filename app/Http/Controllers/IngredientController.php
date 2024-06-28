<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    private function validateIngredientData(Request $request)     {
        return $request->validate([
            'name' => 'required|string|max:255',            
            
                   
        ]);    
}
    public function index()
    {
        $ingredients = Ingredient::orderBy('name')->paginate(10);
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateIngredientData($request);
        
        $ingredient = new Ingredient();
        
        $ingredient->fill($validateData);

        $ingredient->save();

        return redirect()->route('ingredients.index');

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
        $ingredient = Ingredient::findOrFail($id);
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $this->validateIngredientData($request);
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->fill($validateData);

    

        $ingredient->save();
           

        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        if (!$ingredient) {
            return redirect()->route('ingredients.index')->with('error', 'ingrediente non presente');
        }
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'ingrediente eliminato');
    }
}
