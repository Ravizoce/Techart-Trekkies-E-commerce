<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/home', [HomeController::class , 'index'])->name('home');
Route::get('/vueAll', [HomeController::class , 'filter'])->name('filter');