<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
Route::post('/posts',  [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/create',  [PostController::class, 'create'])->middleware('auth');
Route::get('/posts/{post}',  [PostController::class, 'show'])->middleware('auth');
Route::put('/posts/{post}',  [PostController::class, 'update'])->middleware('auth');
Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->middleware('auth');
Route::delete('/posts/{post}',  [PostController::class, 'delete'])->middleware('auth');