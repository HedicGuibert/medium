<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::post('article/{id}/create_comment', [CommentController::class, 'create'])->name('create_comment');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/search', [SearchController::class, 'index'])->name('search');
