<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LoansController;


Route::get('/', [BookController::class, 'welcome'])->name('welcome');
Route::get('/home', [BookController::class, 'index'])->middleware('auth')->name('home');

// Book Routes
Route::get('/create', [BookController::class, 'create'])->middleware('admin')->name('create');
Route::POST('/store', [BookController::class, 'store'])->middleware('admin')->name('save');
Route::get('/book/{id}', [BookController::class, 'show'])->name('show')->middleware('auth');
Route::DELETE('/book/{id}/delete', [BookController::class, 'destroy'])->middleware('admin')->name('destroy');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware('admin')->name('edit.book');
Route::put('/book/update/{id}', [BookController::class, 'update'])->middleware('admin')->name('update');

// Reserves Routes
Route::get('/reserve/requests', [ReservationController::class, 'requests'])->middleware('admin')->name('requests.reserves');
Route::POST('/reserve/requests/validate/{id}', [ReservationController::class, 'validateReserve'])->middleware('admin')->name('requests.validate');
Route::POST('/book/{id}/reserve', [ReservationController::class, 'reserve'])->middleware('auth')->name('reservation');
Route::DELETE('/book/{id}/cancel', [ReservationController::class, 'cancel'])->middleware('auth')->name('cancel.reservation');

// Loans Routes
Route::get('/loans', [LoansController::class, 'panel'])->middleware('admin')->name('loans.panel');
Route::put('/loans/check/{id}', [LoansController::class, 'check'])->middleware('admin')->name('requests.check');

Auth::routes();

