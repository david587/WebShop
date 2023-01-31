<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\cartItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\CartItem;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Require Admin access and token
Route::middleware(['check_admin'])->group(function () {
    Route::middleware(['auth:api'])->post("/Products/Store", [ProductController::class, "store"]);
    Route::middleware(['auth:api'])->post("/Products/Update/{id}", [ProductController::class,"update"]);
    Route::middleware(['auth:api'])->delete("/Products/Delete/{id}", [ProductController::class, "destroy"]);
    //Brand tablenek ->show,store és update és delete utvonal
    Route::middleware(['auth:api'])->get("/Brands/Index", [BrandController::class, "index"]);
    Route::middleware(['auth:api'])->post("/Brands/Store", [BrandController::class, "store"]);
    Route::middleware(['auth:api'])->delete("/Brands/Delete/{id}", [BrandController::class, "destroy"]);
    //Categorie tabelnek ->show,store és delete utvonal
    Route::middleware(['auth:api'])->get("/Categories/Index", [CategorieController::class, "index"]);
    Route::middleware(['auth:api'])->post("/Categories/Store", [CategorieController::class, "store"]);
    Route::middleware(['auth:api'])->delete("/Categories/Delete/{id}", [CategorieController::class, "destroy"]);
    //User routes
    Route::middleware(['auth:api'])->get("/Users/Show",[UserController::class,"listUsers"]);
    Route::middleware(['auth:api'])->post("/Users/Admin/{id}",[UserController::class,"AdminAccess"]);
});

// Auth
Route::post("/register", [AuthController::class, "signUp"]);
Route::post("/login",[AuthController::class, "signIn"]);

//Frontend
Route::get("/Products", [ProductController::class, "index"]);
//Random 4products, visualize in home page
Route::get("/Products/Home",[ProductController::class, "home"]);
Route::get("/Products/Show/{id}", [ProductController::class, "show"]);
//Sorting by Categories
Route::get("/Products/Keyboards", [ProductController::class, "sortKeyboards"]);
Route::get("/Products/Mouses", [ProductController::class, "sortMouses"]);
Route::get("/Products/Headsets", [ProductController::class, "sortHeadsets"]);
Route::get("/Products/Monitors", [ProductController::class, "sortMonitors"]);
//Sorting by Brands
Route::get("/Products/Logitech", [ProductController::class, "sortLogitech"]);
Route::get("/Products/Hp", [ProductController::class, "sortHp"]);
Route::get("/Products/Urage", [ProductController::class, "sortUrage"]);
Route::get("/Products/Redragon", [ProductController::class, "sortRedragon"]);
//subscribe to newsletters
Route::post("/Users/NewsLetter",[UserController::class,"newsLetter"]);
//searchbar
Route::get("/Products/Search",[ProductController::class,"search"]);

//Put item to cart
Route::middleware(['auth:api'])->group(function () {
    Route::post("/cartItems/{id}", [CartItemController::class, "store"]);
    //show CartItems
    Route::get("/cartItems/show",[cartItemController::class, "show"]);
    //Delete cart items
    Route::delete("/cartItems/delete/{id}", [cartItemController::class, "destroy"]);
    //Orders
    Route::post("/Orders/Store/", [OrderController::class,"store"]);
    Route::get("/Orders/Show", [OrderController::class,"showUserItems"]);

    Route::post("/logOut", [AuthController::class, "signOut"]);
});

