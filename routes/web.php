<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AccountController;
use App\Models\Book;

Route::get('/', function () {
    return view('home');
});

// Home route
Route::get('/home', [HomeController::class, 'indexSearch'])->middleware('auth')->name('home');

// Auth routes with email verification
Auth::routes(['verify' => true]);

Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');

// Admin dashboard route
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// Grouped routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class)->except(['show']);
    Route::get('books/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Categories resource route
Route::resource('categories', CategoryController::class);

// Search route
Route::get('/search', [BookController::class, 'search'])->name('books.search');

// Show book details route
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Account edit route
Route::get('/edit-account', [AccountController::class, 'edit'])->middleware('auth')->name('edit.account');
Route::post('/update-account', [AccountController::class, 'update'])->middleware('auth')->name('update.account');
Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
