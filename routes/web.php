<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/bases', function () {
    return view('bases');
})->name('bases');

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
Route::resource('bases', BaseController::class);

require __DIR__.'/auth.php';
