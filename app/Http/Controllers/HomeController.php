<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    protected $ingredients;

    public function __construct()
    {
        $this->ingredients = Ingredient::all();
    }
    public function index()
    {
        $dishes = Dish::inRandomOrder()->paginate(8);  
        return view('welcome', ['dishes' => $dishes, 'ingredients' => $this->ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);
        return view('show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        
        $search = $request->search;

        if ($search == '') {
            return redirect()->route('welcome')->with('error', 'inserisci almeno una parola per effettuare la ricerca');;
        } else {
        
        $dishes = Dish::where('name','like','%'.$search .'%')->get();
        }

        return view('dishes.search', ['dishes' => $dishes, 'ingredients' => $this->ingredients]);
    }
    public function ingredient( $ingredient)
    {
        try {
            $ingredient = Ingredient::where('name', $ingredient)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

       

        $dishes = $ingredient->dishes()->get(); 

        
        return view('dishes.ingredient', ['dishes' => $dishes, 'ingredient' => $ingredient, 'ingredients' => $this->ingredients]);
    }
    public function contatti(Request $request)
    {
        return view('contact', ['ingredients' => $this->ingredients]);
    }
    
}
