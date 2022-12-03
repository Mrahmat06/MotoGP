<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MusimController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/',[LoginController::class,'showLoginForm'])->name('login');
Route::prefix('Pengguna')->group(function(){
    Route::get('/', [PenggunaController::class, 'index'])->name('Pengguna.index');
Route::get('add', [PenggunaController::class, 'create'])->name('Pengguna.create');
Route::post('store', [PenggunaController::class, 'store'])->name('Pengguna.store');
Route::get('edit/{id}', [PenggunaController::class, 'edit'])->name('Pengguna.edit');
Route::post('update/{id}', [PenggunaController::class, 'update'])->name('Pengguna.update');
Route::post('delete/{id}', [PenggunaController::class, 'delete'])->name('Pengguna.delete');
});
Route::prefix('Musim')->group(function(){
    Route::get('/', [MusimController::class, 'index'])->name('Musim.index');
Route::get('add', [MusimController::class, 'create'])->name('Musim.create');
Route::post('store', [MusimController::class, 'store'])->name('Musim.store');
Route::get('edit/{id}', [MusimController::class, 'edit'])->name('Musim.edit');
Route::post('update/{id}', [MusimController::class, 'update'])->name('Musim.update');
Route::post('delete/{id}', [MusimController::class, 'delete'])->name('Musim.delete');
});
Route::prefix('Rider')->group(function(){
    Route::get('/', [RiderController::class, 'index'])->name('Rider.index');
Route::get('add', [RiderController::class, 'create'])->name('Rider.create');
Route::post('store', [RiderController::class, 'store'])->name('Rider.store');
Route::get('edit/{id}', [RiderController::class, 'edit'])->name('Rider.edit');
Route::post('update/{id}', [RiderController::class, 'update'])->name('Rider.update');
Route::post('delete/{id}', [RiderController::class, 'delete'])->name('Rider.delete');
Route::post('softdelete/{id}', [RiderController::class, 'softdelete'])->name('Rider.softdelete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
