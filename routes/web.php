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
Route::get('/dashboard/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/dashboard/client/store', [ClientController::class, 'store'])->name('client.store');
Route::delete('/dashboard/client//delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');

//Contact Us
Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('index.contact');
Route::get('/dashboard/contact/edit/{id}', [ContactController::class, 'edit'])->name('edit.contact');
Route::patch('/dashboard/contact/update/{id}', [ContactController::class, 'update'])->name('update.contact');

//Portfolio
Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->name('index.portfolio');
Route::get('/dashboard/portfolio/create', [PortfolioController::class, 'create'])->name('create.portfolio');
Route::post('/dashboard/portfolio/store', [PortfolioController::class, 'store'])->name('store.portfolio');
Route::get('/dashboard/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
Route::patch('/dashboard/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
Route::delete('/dashboard/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('delete.portfolio');

//Vision & Mission
Route::get('/dashboard/vismis', [VisionMissionController::class, 'index'])->name('index.VisMiss');
Route::get('/dashboard/vismis/edit/{id}', [VisionMissionController::class, 'edit'])->name('edit.VisMiss');
Route::patch('/dashboard/vismis/update/{id}', [VisionMissionController::class, 'update'])->name('update.VisMiss');