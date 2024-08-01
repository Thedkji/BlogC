<?php

use App\Http\Controllers\clients\CategoryController;
use App\Http\Controllers\clients\PostController;

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
    return redirect()->route('client.index');
});

// client

// Post
Route::prefix('client')
    ->name('client.')
    ->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/{id}/category', [CategoryController::class, 'category'])->name('category');
        Route::get('/{id}/post-detail', [PostController::class, 'postDetail'])->name('postDetail');
        Route::get('/search', [PostController::class, 'search'])->name('search');
    });
