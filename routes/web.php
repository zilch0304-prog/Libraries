<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\AuthController;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default: show signup first
Route::get('/', [AuthController::class, 'showLogin'])->name('home');

// Categories CRUD (Admin only)
Route::resource('categories', CategoryController::class);

// Books CRUD (Admin only)
Route::resource('books', BookController::class);

// Borrowing system (User)
Route::post('/books/{book}/avail', [BorrowController::class, 'avail'])->name('books.avail');
Route::post('/books/{book}/return', [BorrowController::class, 'returnBook'])->name('books.return');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authentication
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// ✅ Admin dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ✅ User book list
Route::get('/user/books', function () {
    $books = Book::with('category')->get();
    return view('user_books.user_index', compact('books'));
})->name('user.books.index');
