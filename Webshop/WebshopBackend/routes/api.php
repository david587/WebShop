<?php

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartItemController;
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




//Require Admin access and token
// Route::middleware(['check_admin'])->group(function () {
    //name,price,details,imageurl,stock number,brand,categorie
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

    // send messages to stored emails,
    Route::middleware(['auth:api'])->get('/sendEmail', [EmailController::class,'sendEmail']);
// });

// Auth
//name,adress,phone,email,password,confirm_password
Route::post("/register", [AuthController::class, "signUp"]);
//email,password
Route::post("/login",[AuthController::class, "signIn"]);

//Frontend
//pagination is in it, so if we providing number in the $request->page ,per page/10 products
Route::get("/Products", [ProductController::class, "index"]);
//Random 4products, visualize in home page
Route::get("/Products/Home",[ProductController::class, "home"]);
Route::get("/Products/Show/{id}", [ProductController::class, "show"]);

//Sorting
Route::get("/Products/Categories/{name}", [ProductController::class, "sortCategories"]);
Route::get("/Products/Brands/{name}", [ProductController::class, "sortBrands"]);

//subscribe to newsletters,store email
Route::post("/Users/NewsLetter",[UserController::class,"newsLetter"]);
//searchbar,searching
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

