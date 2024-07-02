<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//      return view('welcome');
//  });

// Route::get('/ricette/{dish}', [HomeController::class,'show'])->name('show');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/ricette/ricerca', [HomeController::class, 'search'])->name('dishes.search');

Route::get('/dishes/ingredient/{ingredient}',  [HomeController::class, 'ingredient'])->name('dishes.ingredient');
Route::get('/contact',  [HomeController::class, 'contatti'])->name('email');

// Route::get('/contact', function () {
//     return view('contact');
//     })->name('email');
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/ricette', [DishController::class, 'index'])->name('dishes.index');

Route::get('/ricette/create', [DishController::class, 'create'])->name('dishes.create');

Route::get('/ricette/{id}/edit', [DishController::class, 'edit'])->name('dishes.edit');

Route::post('/ricette', [DishController::class, 'store'])->name('dishes.store');

Route::put('/ricette/{id}', [DishController::class, 'update'])->name('dishes.update');
Route::delete('/ricette/{id}', [DishController::class, 'destroy'])->name('dishes.destroy');


Route::get('/ingredienti', [IngredientController::class, 'index'])->name('ingredients.index');

Route::get('/ingredienti/create', [IngredientController::class, 'create'])->name('ingredients.create');

Route::get('/ingredienti/{id}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');

Route::post('/ingredienti', [IngredientController::class, 'store'])->name('ingredients.store');

Route::put('/ingredienti/{id}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredienti/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');


Route::get('/localita', [RegionController::class, 'index'])->name('regions.index');

Route::get('/localita/create', [RegionController::class, 'create'])->name('regions.create');

Route::get('/localita/{id}/edit', [RegionController::class, 'edit'])->name('regions.edit');

Route::post('/localita', [RegionController::class, 'store'])->name('regions.store');

Route::put('/localita/{id}', [RegionController::class, 'update'])->name('regions.update');
Route::delete('/localita/{id}', [RegionController::class, 'destroy'])->name('regions.destroy');





