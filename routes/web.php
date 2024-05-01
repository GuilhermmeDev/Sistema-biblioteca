<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LoansController;


Route::get('/', [BookController::class, 'welcome'])->name('welcome');
Route::get('/home', [BookController::class, 'index'])->middleware('auth')->name('home');

// Book Routes
Route::get('/create', [BookController::class, 'create'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('create');
Route::POST('/store', [BookController::class, 'store'])->name('save');
Route::get('/book/{id}', [BookController::class, 'show'])->name('show')->middleware('auth');
Route::POST('/book/{id}/reserve', [ReservationController::class, 'reserve'])->middleware('auth')->name('reservation');
Route::DELETE('/book/{id}/delete', [BookController::class, 'destroy'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('destroy');
Route::DELETE('/book/{id}/cancel', [ReservationController::class, 'cancel'])->middleware('auth')->name('cancel.reservation');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('edit.book');
Route::put('/book/update/{id}', [BookController::class, 'update'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('update');

// Reserves Routes
Route::get('/reserve/requests', [ReservationController::class, 'requests'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('requests.reserves');
Route::POST('/reserve/requests/validate/{id}', [ReservationController::class, 'validateReserve'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('requests.validate');

// Loans Routes
Route::get('/loans', [LoansController::class, 'panel'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('requests.panel');
Route::put('/loans/check/{id}', [LoansController::class, 'check'])->middleware('App\Http\Middleware\AdminMiddleWare')->name('requests.check');

Auth::routes();

