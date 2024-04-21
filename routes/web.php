<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']);
Route::get('/create', [BookController::class, 'create']);
Route::POST('/store', [BookController::class, 'store']);
Route::get('/book/{id}', [BookController::class, 'show']);
