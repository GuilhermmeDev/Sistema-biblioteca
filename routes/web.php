<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

Route::get('/', [BookController::class, 'index'])->name('principal');
Route::get('/create', [BookController::class, 'create'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('Criar livros');
Route::POST('/store', [BookController::class, 'store'])->name('Salvar no BD');
Route::get('/book/{id}', [BookController::class, 'show'])->name('Mostrar livros');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
