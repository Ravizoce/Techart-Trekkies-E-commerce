<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/signin', [RegisterController::class, 'index'])->name('signin');
    Route::post('/log-in', [LoginController::class, 'login'])->name('logup');
    Route::post('/sign-in', [RegisterController::class, 'store'])->name('signup');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::post('/filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/filter', [HomeController::class, 'filter'])->name('vueall');
// Route::get('/details/{id}',[HomeController::class,"productDetailes"])->name("detailes");

Route::middleware(['auth'])->group(function () {
    Route::get("/logout", [LoginController::class, 'logout'])->name('logout');
    Route::get('add/cart/{id}',[CartController::class,"store"])->name("AddToCart");
    Route::get('cart',[CartController::class,"index"])->name("cart");
    Route::get('cart/delete/{cart}',[CartController::class,"delete"])->name("cartDelete");
    Route::get('profile',[ProfileController::class,"index"])->name("profile");
    Route::put('updateProfile/{user}',[ProfileController::class,"update"])->name("updateProfile");
    Route::delete('deleteprofile/{user}',[ProfileController::class,"delete"])->name("deleteProfile");
    Route::get('add/address',[ProfileController::class,"address"])->name("addAddress");
    Route::post('add/address',[ProfileController::class,"createAddress"])->name("addressstore");
    Route::get('update/address/{address}',[ProfileController::class,"updateAddressindex"])->name("updateAddress");
    Route::post('update/address/{address}',[ProfileController::class,"updateAddress"])->name("address.update");
    Route::delete('delete/address/{address}',[ProfileController::class,"deleteAddress"])->name("deleteAddress");
    
});
