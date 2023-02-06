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
Route::get('/create', [ClientController::class, 'create'])->name('create.client');
Route::post('/store', [ClientController::class, 'store'])->name('store.client');
Route::delete('/delete/{id}', [ClientController::class, 'destroy'])->name('delete.client');

//Contact Us
Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('index.contact');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('edit.contact'); 
Route::patch('/update/{id}', [ContactController::class, 'update'])->name('update.contact');

//Portfolio
Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->name('index.potfolio');
Route::get('/create', [PortfolioController::class, 'create'])->name('create.portfolio');
Route::post('/store', [PortfolioController::class, 'store'])->name('store.portfolio');
Route::get('/edit/{id}', [PortfolioController::class, 'edit'])->name('edit.potrfolio'); 
Route::patch('/update/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
Route::delete('/delete/{id}', [PortfolioController::class, 'destroy'])->name('delete.portfolio');

//Vision & Mission
Route::get('/dashboard/vismis', [VisionMissionController::class, 'index'])->name('index.VisMiss');
Route::get('/edit/{id}', [VisionMissionController::class, 'edit'])->name('edit.VisMiss'); 
Route::patch('/update/{id}', [VisionMissionController::class, 'update'])->name('update.VisMiss');
