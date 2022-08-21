<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category:slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index']);

Route::get("/log-in", [AuthController::class, 'showSignInForm']);
Route::post("/log-in", [AuthController::class, 'signIn']);

Route::get("/sign-up", [AuthController::class, 'showSignUpForm']);
Route::post("/sign-up", [AuthController::class, 'signUp']);

Route::get("/log-out", [AuthController::class, 'logout']);

Route::group(["middleware" => "auth"], function () {
    Route::get("/basket", [CardController::class, 'index']);
    Route::get("/basket/add/{product}", [CardController::class, 'add']);
    Route::get("/basket/delete/{cartDetails}", [CardController::class, 'remove']);

    Route::get("/buy", [CheckoutController::class, 'showCheckoutForm']);
    Route::post("/buy", [CheckoutController::class, 'checkout']);
});

Route::group(["middleware" => "auth"], function () {
    Route::resource("/users", UserController::class);
    Route::get("/users/{user}/change-password", [UserController::class, 'passwordForm']);
    Route::post("/users/{user}/change-password", [UserController::class, 'changePassword']);
    Route::resource("/users/{user}/addresses", AddressController::class);
    Route::resource("/categories", CategoryController::class);
    Route::resource("/products", ProductController::class);
    Route::resource("/products/{product}/images", ProductImageController::class);
});
