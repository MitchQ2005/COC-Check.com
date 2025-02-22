<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/bases', [BaseController::class, 'index'])->name('bases.index');

Route::get('/bases/create', [BaseController::class, 'create'])->middleware('auth')->name('bases.create');
Route::post('/bases', [BaseController::class, 'store'])->middleware('auth')->name('bases.store');
Route::get('/bases/{base}', [BaseController::class, 'show'])->name('bases.show');

Route::get('/bases/{base}/edit', [BaseController::class, 'edit'])->middleware('auth')->name('bases.edit');
Route::patch('/bases/{base}', [BaseController::class, 'update'])->middleware('auth')->name('bases.update');

Route::delete('/bases/{base}', [BaseController::class, 'destroy'])->middleware('auth')->name('bases.destroy');

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