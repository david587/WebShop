<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [AuthController::class, "signUp"]);
Route::post("/login",[AuthController::class, "signIn"]);
Route::post("/logOut", [AuthController::class, "signOut"]);

//Frontend
Route::get("/Products", [ProductController::class, "index"]);

//Asztali alkalmazás rest-api
Route::post("/Products/Store", [ProductController::class, "store"]);
Route::get("/Products/Show/{id}", [ProductController::class, "show"]);
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
