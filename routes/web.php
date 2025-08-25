<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/customers', App\Http\Controllers\CustomerController::class)
    ->middleware('auth')
    ->except(['show']);

Route::resource('/employees', App\Http\Controllers\EmployeeController::class)
    ->middleware('auth')
    ->except(['show']);

Route::resource('/services', App\Http\Controllers\ServiceController::class)
    ->middleware('auth')
    ->except(['show']);
