<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ContactController;



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

// Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Route voor de CRUD vanuit de Base controller
// Route::resource('bases', BaseController::class);  ////  TODO deze hebben we eigenlijk niet meer nodig, staan nu wel dingen dubbel op auth, maar kan geen kwaad denk ik

require __DIR__ . '/auth.php';
