<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimoniController;

Route::middleware('Guest')->group(function () {
Route::get('/', function () {
    return view('welcome');
});
Route::get('/portofolio', [PortfolioController::class, 'porto'])->name('porto');
Route::get('/publikasi/detail/{id}', [PublikController::class, 'publikk'])->name('publikk');

//auth
Route::get('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/auth/login', [RegistrationController::class, 'auth'])->name('login.auth');
});

Route::middleware(['Login', 'Role:admin'])->group(function () {
//Client
Route::get('/dashboard/client', [ClientController::class, 'index'])->name('index');
Route::post('/dashboard/client/store', [ClientController::class, 'store'])->name('store.client');
Route::get('/dashboard/client/delete', [ClientController::class, 'destroy'])->name('delete.client');

//Contact Us
Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('index.contact');
Route::post('/dashboard/contact/store', [ContactController::class, 'store'])->name('store.contact');
Route::get('/dashboard/contact/edit/{id}', [ContactController::class, 'edit'])->name('edit.contact');
Route::post('/dashboard/contact/update/', [ContactController::class, 'update'])->name('update.contact');

//Portfolio
Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->name('index.portfolio');
Route::post('/dashboard/portfolio/store', [PortfolioController::class, 'store'])->name('store.portfolio');
Route::get('/dashboard/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
Route::post('/dashboard/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
Route::get('/dashboard/portfolio/delete', [PortfolioController::class, 'destroy'])->name('delete.portfolio');

//Vision & Mission
Route::get('/dashboard/vismis', [VisionMissionController::class, 'index'])->name('index.VisMiss');
Route::post('/dashboard/vismis/store', [VisionMissionController::class, 'store'])->name('store.VisMiss');
Route::get('/dashboard/vismis/edit', [VisionMissionController::class, 'edit'])->name('edit.VisMiss');
Route::post('/dashboard/vismis/update', [VisionMissionController::class, 'update'])->name('update.VisMiss');

//Service
Route::get('/dashboard/service', [ServiceController::class, 'index'])->name('index.services');
Route::post('/dashboard/service/store', [ServiceController::class, 'store'])->name('store.services');
Route::get('/dashboard/service/edit', [ServiceController::class, 'edit'])->name('edit.services');
Route::post('/dashboard/service/update/{id}', [ServiceController::class, 'update'])->name('update.services');
Route::get('/dashboard/service/delete', [ServiceController::class, 'destroy'])->name('delete.services');

//Testimoni
Route::get('/dashboard/testimoni', [TestimoniController::class, 'index'])->name('index.testimoni');
Route::post('/dashboard/testimoni/store', [TestimoniController::class, 'store'])->name('store.testimoni');
Route::get('/dashboard/testimoni/delete', [TestimoniController::class, 'destroy'])->name('delete.testimoni');

//Portfolio
Route::get('/dashboard/publik', [PublikController::class, 'index'])->name('index.publik');
Route::post('/dashboard/publik/store', [PublikController::class, 'store'])->name('store.publik');
Route::get('/dashboard/publik/edit/{id}', [PublikController::class, 'edit'])->name('edit.publik');
Route::post('/dashboard/publik/update/{id}', [PublikController::class, 'update'])->name('update.publik');
Route::get('/dashboard/publik/delete', [PublikController::class, 'destroy'])->name('delete.publik');

});

Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
Route::get('/error', [RegistrationController::class, 'error'])->name('error');
