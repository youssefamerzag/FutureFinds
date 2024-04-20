<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkAge;
use App\Http\Middleware\CheckProfile;
use App\Models\CardItem;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Psy\VersionUpdater\Checker;


Auth::routes();

Route::get('/', [ProductsController::class , 'index'])->name('producthome.index');



//categories
Route::get('/category/{category}' , [CategoriesController::class , 'index'])->name('categories.index');
Route::get('/lowerToHigher/{category}', [CategoriesController::class, 'sortBy'])->name('product.sortby');
Route::get('/higherToLower/{category}', [CategoriesController::class, 'sortByDesc'])->name('product.sortByDesc');

//product
Route::get('/product/{product}', [ProductsController::class , 'show'])->name('products.show');
Route::get('/product', [ProductsController::class, 'search'])->name('products.search');
Route::get('/card', [CardController::class , 'index'])->name('card.index');

//card
Route::post('/card/{product}' , [CardController::class, 'add'])->name('card.add');
Route::get('/card', [CardController::class, 'index'])->name('card.items');
Route::delete('/card/{product}/delete', [CardController::class, 'destroy'])->name('card.destroy');