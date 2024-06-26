<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkAge;
use App\Http\Middleware\CheckProfile;
use App\Models\CardItem;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Promotion;
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
Route::post('/card/{product}/buy', [CardController::class , 'buyNow'])->name('card.buy');
Route::get('/card', [CardController::class, 'index'])->name('card.items');
Route::delete('/card/{product}/delete', [CardController::class, 'destroy'])->name('card.destroy');

//order 
Route::get('/card/{card}/pay' , [OrderController::class , 'checkout'])->name('order.create');

//contact
Route::post('/contact/send' , [ContactUsController::class , 'send'])->name('contact.send');


//dashboard
Route::prefix('/dashboard')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::get('/product/{product}/edit' , [ProductsController::class , 'edit'])->name('dashboard.editProduct');
            Route::put('/product/{product}/edit' , [ProductsController::class , 'update'])->name('dashboard.updateProduct');
            Route::delete('/product/{product}/delete', [ProductsController::class , 'destroy'])->name('dashboard.deleteProduct');
            Route::get('/' , [StatisticsController::class ,'index'])->name('dashboard.index');

            //products
            Route::get('/products' , [ProductsController::class , 'DashoardIndex'])->name('dashboard.products');
            Route::get('/product/create', [ProductsController::class, 'create'])->name('dashboard.createProduct');
            Route::post('/product/create' , [ProductsController::class , 'store'])->name('dashboard.storeProduct');
            Route::get('/product/{product}/edit' , [ProductsController::class, 'edit'])->name('dashboard.productsEdit');
            Route::put('/product/{product}/edit' , [ProductsController::class, 'update'])->name('dashboard.productsUpdate');

            //users
            Route::get('/users' , [UserController::class , 'users'])->name('dashboard.users');
            Route::get('/user/{user}/details' , [UserController::class , 'show'])->name('dashboard.usersDetails');
            Route::delete('/user/{user}/delete', [UserController::class , 'destroy'])->name('dashboard.userDestroy');

            //orders
            Route::get('/orders' , [OrderController::class , 'index'])->name('dashboard.orders');

            //promotion 
            Route::get('/promotions' , [PromotionController::class , 'index'])->name('dashboard.promotions');
            Route::get('/promotios/{promotion}/edit' , [PromotionController::class , 'edit'])->name('dashboard.Editpromotions');
            Route::put('/promotios/{promotion}/edit' , [PromotionController::class , 'update'])->name('dashboard.Updatepromotions');
        });
    });
});