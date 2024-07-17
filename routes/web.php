<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified');

Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/home', function () {
    return view('empty-home');
})->middleware('auth');

// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class)->except(['show']);
    Route::get('books/{book}', [BookController::class, 'edit'])->name('books.edit'); // Menentukan rute edit secara eksplisit
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update'); // Menentukan rute update secara eksplisit
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy'); // Menentukan rute destroy secara eksplisit
});

Route::resource('categories', CategoryController::class);

