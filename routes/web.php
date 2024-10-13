<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/kategori', App\Http\Controllers\KategoriController::class);
Route::resource('/post', App\Http\Controllers\PostController::class);
Route::resource('/home', App\Http\Controllers\HomeController::class);