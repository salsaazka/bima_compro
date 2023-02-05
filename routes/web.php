<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\VisionMissionController;


Route::get('/', function () {
    return view('admin.index');
});

//Client
Route::get('/dashboard/client', [ClientController::class, 'index'])->name('index');
Route::get('/create', [ClientController::class, 'create'])->name('create');
Route::post('/store', [ClientController::class, 'store'])->name('store');
Route::delete('/delete/{id}', [ClientController::class, 'destroy'])->name('delete');

//Contact Us
Route::get('/dashboard/contact', [ClientController::class, 'index'])->name('index');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('edit'); 
Route::patch('/update/{id}', [ContactController::class, 'update'])->name('update');

//Portfolio
Route::get('/dashboard/portfolio', [ClientController::class, 'index'])->name('index');
Route::get('/create', [PortfolioController::class, 'create'])->name('create');
Route::post('/store', [PortfolioController::class, 'store'])->name('store');
Route::get('/edit/{id}', [PortfolioController::class, 'edit'])->name('edit'); 
Route::patch('/update/{id}', [PortfolioController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [PortfolioController::class, 'destroy'])->name('delete');

//Vision & Mission
Route::get('/dashboard/vismis', [ClientController::class, 'index'])->name('index');
Route::get('/edit/{id}', [VisionMissionController::class, 'edit'])->name('edit'); 
Route::patch('/update/{id}', [VisionMissionController::class, 'update'])->name('update');
