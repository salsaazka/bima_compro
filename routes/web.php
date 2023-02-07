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
Route::post('/dashboard/client/store', [ClientController::class, 'store'])->name('store.client');
Route::get('/dashboard/client/delete/', [ClientController::class, 'destroy'])->name('delete.client');

//Contact Us
Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('index.contact');
Route::post('/dashboard/contact/store', [ContactController::class, 'store'])->name('store.contact');
Route::get('/dashboard/contact/edit/{id}', [ContactController::class, 'edit'])->name('edit.contact');
Route::post('/dashboard/contact/update/', [ContactController::class, 'update'])->name('update.contact');

//Portfolio
Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->name('index.portfolio');
// Route::get('/dashboard/portfolio/create', [PortfolioController::class, 'create'])->name('create.portfolio');
Route::post('/dashboard/portfolio/store', [PortfolioController::class, 'store'])->name('store.portfolio');
Route::get('/dashboard/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
Route::patch('/dashboard/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
Route::delete('/dashboard/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('delete.portfolio');

//Vision & Mission
Route::get('/dashboard/vismis', [VisionMissionController::class, 'index'])->name('index.VisMiss');
//Route::get('/dashboard/vismis/create', [VisionMissionController::class, 'create'])->name('create.VisMiss');
Route::post('/dashboard/vismis/store', [VisionMissionController::class, 'store'])->name('store.VisMiss');
Route::get('/dashboard/vismis/edit', [VisionMissionController::class, 'edit'])->name('edit.VisMiss');
Route::post('/dashboard/vismis/update', [VisionMissionController::class, 'update'])->name('update.VisMiss');
