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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/bases', [BaseController::class, 'index'])->name('bases.index');

Route::get('/bases/create', [BaseController::class, 'create'])->middleware('auth')->name('bases.create'); // route voor invoer "veld" van create

Route::post('/bases', [BaseController::class, 'store'])->middleware('auth')->name('bases.store'); // route voor in DB zetten van een basis
Route::get('/bases/{base}', [BaseController::class, 'show'])->name('bases.show'); // route voor een enkele basis laten zien

Route::get('/bases/{base}/edit', [BaseController::class, 'edit'])->middleware('auth')->name('bases.edit');  // route voor basis update "veld"
Route::patch('/bases/{base}', [BaseController::class, 'update'])->middleware('auth')->name('bases.update'); // route voor basis DB update 

Route::delete('/bases/{base}', [BaseController::class, 'destroy'])->middleware('auth')->name('bases.destroy'); /// route voor basis verwijderen

Route::get('bases/auth/my-bases', [BaseController::class, 'myBases'])->middleware('auth')->name('bases.my-bases'); /// basis die gebruiker heeft ingevoerd

//// hieronder routers voor de headers login,dashboard, daaronder op route middelware ( validatie), 
// staan de routes om je profiel aan te passen


Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

