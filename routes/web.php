<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::post('/article/{id}/create_comment', [CommentController::class, 'create'])->name('create_comment');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update-informations', [ProfileController::class, 'updateInformations'])->name('profile_update_informations');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile_update_password');
    Route::post('/profile/update-socials', [ProfileController::class, 'updateSocials'])->name('profile_update_socials');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});

// Routes that require author access
Route::middleware(['auth', 'can:isAuthor'])->group(function () {
});

// Routes that require editor access
Route::middleware(['auth', 'can:isEditor'])->group(function () {
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/search', [SearchController::class, 'index'])->name('search');
