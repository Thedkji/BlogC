<?php

use App\Http\Controllers\admins\CategoryController as AdminsCategoryController;
use App\Http\Controllers\admins\PostController as AdminsPostController;
use App\Http\Controllers\admins\UserController;

use App\Http\Controllers\clients\CategoryController;
use App\Http\Controllers\clients\CommentController;
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

// Post (bài viết)
Route::prefix('client')
    ->name('client.')
    ->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category');
        Route::get('/post-detail/{id}', [PostController::class, 'postDetail'])->name('postDetail');
        Route::get('/search', [PostController::class, 'search'])->name('search');

        Route::post('/comment/{id}', [CommentController::class, 'storeComment'])->name('comment');
    });

// admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('isAdmin');

        // Login
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::post('/login', [UserController::class, 'loginPost'])->name('login-post');

        // Register
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::post('/register', [UserController::class, 'registerPost'])->name('register-post');

        // Logout
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');

        // Forgot pass
        Route::get('/forgot-pass', [UserController::class, 'forgotPass'])->name('forgot-pass');

        //Verify Email
        Route::get('/verify-email/{email}', [UserController::class, 'verifyEmail'])->name('verify-email');

        // Categories
        Route::name('category.')
            ->controller(AdminsCategoryController::class)
            ->middleware('isAdmin')
            ->group(function () {
                Route::get('/category', 'index')->name('index');
                Route::get('/category/create', 'create')->name('create');
                Route::post('/category/store', 'store')->name('store');
                Route::get('/category/edit/{id}', 'edit')->name('edit');
                Route::put('/category/edit/{id}', 'update')->name('update');
                Route::delete('/category/destroy/{id}', 'destroy')->name('destroy');
            });

        // Posts
        Route::name('post.')
            ->controller(AdminsPostController::class)
            ->middleware('isAdmin')
            ->group(function () {
                Route::get('/post', 'index')->name('index');
                Route::get('/post/create', 'create')->name('create');
                Route::post('/post/create', 'store')->name('store');
                Route::get('/post/edit/{id}', 'edit')->name('edit');
                Route::put('/post/edit/{id}', 'update')->name('update');
                Route::delete('/post/destroy/{id}', 'destroy')->name('destroy');
            });
    });
