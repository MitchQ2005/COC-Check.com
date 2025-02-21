<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

// ✅ Home route correct instellen
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ Statische pagina's correct instellen
Route::view('/bases', 'bases')->name('bases');
Route::view('/search', 'search')->name('search');
Route::view('/login', 'login')->name('login');
Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile routes onder authentication middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ CRUD routes voor BaseController
Route::resource('bases', BaseController::class);

// ✅ Authenticatie routes
require __DIR__.'/auth.php';

// ✅ Contact routes correct instellen
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ✅ Search routes correct instellen
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search/player', [SearchController::class, 'searchPlayer'])->name('search.player');
Route::post('/search/clan', [SearchController::class, 'searchClan'])->name('search.clan');
Route::get('/clan/{tag}', [SearchController::class, 'showClan'])->name('clan.show');
Route::get('/player/{tag}', [SearchController::class, 'showPlayer'])->name('player.show');

