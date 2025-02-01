<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('author/dashboard', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');

    Route::middleware('role:administrator')->group(function () {
        Route::get('author/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('author/store', [AuthorController::class, 'store'])->name('author.store');
        Route::get('author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
        Route::put('author/{id}/update', [AuthorController::class, 'update'])->name('author.update');
        Route::delete('author/destory/{id}', [AuthorController::class, 'destory'])->name('author.destroy');

        Route::get('books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('books/store', [BookController::class, 'store'])->name('books.store');
        Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('books/{id}/update', [BookController::class, 'update'])->name('books.update');
        Route::delete('books/destory/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    });
});

require __DIR__ . '/auth.php';
