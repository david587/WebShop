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

Route::middleware(['auth:api'])->group(function () {
    // 
});

//Require Admin access
Route::middleware(['check_admin'])->group(function () {
    Route::middleware(['auth:api'])->post("/Products/Store", [ProductController::class, "store"]);
    Route::post("/Products/Update/{id}", [ProductController::class,"update"]);
    Route::delete("Products/Delete/{id}", [ProductController::class, "destroy"]);
    //Brand tablenek ->show,store és update és delete utvonal
    Route::get("/Brands/Index", [BrandController::class, "index"]);
    Route::post("/Brands/Store", [BrandController::class, "store"]);
    Route::delete("/Brands/Delete/{id}", [BrandController::class, "destroy"]);
    //Categorie tabelnek ->show,store és delete utvonal
    Route::get("/Categories/Index", [CategorieController::class, "index"]);
    Route::post("/Categories/Store", [CategorieController::class, "store"]);
    Route::delete("/Categories/Delete/{id}", [CategorieController::class, "destroy"]);
    //User routes
    Route::get("Users/Show",[UserController::class,"listUsers"]);
    Route::post("Users/Admin/{id}",[UserController::class,"AdminAccess"]);
});





Route::post("/register", [AuthController::class, "signUp"]);
Route::post("/login",[AuthController::class, "signIn"]);
Route::post("/logOut", [AuthController::class, "signOut"]);

//Frontend
Route::get("/Products", [ProductController::class, "index"]);
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
//Put item to cart
// Route::post("Products/cartItems/{id}", [cartItemController::class, "store"]);
Route::middleware(['auth:api'])->post("cartItems/{id}", [CartItemController::class, "store"]);
//show CartItems
Route::middleware(['auth:api'])->get("/cartItems/show",[cartItemController::class, "show"]);
//Delete cart items
Route::middleware(['auth:api'])->delete("/cartItems/delete/{id}", [cartItemController::class, "destroy"]);
//Orders
Route::middleware(['auth:api'])->post("Orders/Store/", [OrderController::class,"store"]);
Route::middleware(['auth:api'])->get("Orders/Show", [OrderController::class,"showUserItems"]);


//Asztali alkalmazás rest-api
Route::middleware(['auth:api'])->post("/Products/Store", [ProductController::class, "store"]);
Route::post("/Products/Update/{id}", [ProductController::class,"update"]);
Route::delete("Products/Delete/{id}", [ProductController::class, "destroy"]);
//Brand tablenek ->show,store és update és delete utvonal
Route::get("/Brands/Index", [BrandController::class, "index"]);
Route::post("/Brands/Store", [BrandController::class, "store"]);
Route::delete("/Brands/Delete/{id}", [BrandController::class, "destroy"]);
//Categorie tabelnek ->show,store és delete utvonal
Route::get("/Categories/Index", [CategorieController::class, "index"]);
Route::post("/Categories/Store", [CategorieController::class, "store"]);
Route::delete("/Categories/Delete/{id}", [CategorieController::class, "destroy"]);
//User routes
Route::get("Users/Show",[UserController::class,"listUsers"]);
Route::post("Users/Admin/{id}",[UserController::class,"AdminAccess"]);
