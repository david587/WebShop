<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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
//Brand tablenek ->show,store és update és delete metodusa
Route::get("/Brands/Show", [BrandController::class, "show"]);
Route::post("/Brands/Store", [BrandController::class, "store"]);
