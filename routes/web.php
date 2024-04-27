<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

Route::get('/', [BookController::class, 'index']);
Route::get('/create', [BookController::class, 'create']);
Route::POST('/store', [BookController::class, 'store']);
Route::get('/book/{id}', [BookController::class, 'show']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/teste', [HomeController::class, 'teste'])->name('testando')->middleware('auth');
