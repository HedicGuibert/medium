<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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

Route::middleware('security.logged')->group(function (){
    Route::post('article/{id}/create_comment', [CommentController::class, 'create'])->name("create_comment");
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::middleware(['security.logged'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
});
