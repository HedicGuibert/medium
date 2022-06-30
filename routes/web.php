<?php

use App\Http\Controllers\ArticleGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteController;
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
    Route::post('/article/{id}/create_comment', [CommentController::class, 'create'])->name('create_comment');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
<<<<<<< HEAD
    Route::post('/profile/update-informations', [ProfileController::class, 'updateInformations'])->name('profile_update_informations');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile_update_password');
    Route::post('/profile/update-socials', [ProfileController::class, 'updateSocials'])->name('profile_update_socials');
    Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
    Route::post('/favourite/add/{id}', [FavouriteController::class, 'add'])->name('favourite.add');
    Route::post('/favourite/remove/{id}', [FavouriteController::class, 'remove'])->name('favourite.remove');
    Route::get('/article-groups/{userId?}', [ArticleGroupController::class, 'index'])->name('article-groups.index');
});

// Routes that require author access
Route::middleware(['auth', 'can:isAuthor'])->group(function () {
    Route::get('/admin/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
    Route::get('/admin/articles/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('details_article');
    Route::put('/admin/articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('update_article');
    Route::get('/admin/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name("create_article");
    Route::post('/admin/article/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('store_article');
    Route::delete('/admin/articles/{id}', [App\Http\Controllers\ArticleController::class, 'delete'])->name('delete_article');
});
// Routes that require editor access
Route::middleware(['auth', 'can:isEditor'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{slug?}', [CategoryController::class, 'update'])->name('categories.update');
=======
    Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
    Route::post('/favourite/add/{id}', [FavouriteController::class, 'add'])->name('favourite.add');
    Route::post('/favourite/remove/{id}', [FavouriteController::class, 'remove'])->name('favourite.remove');
>>>>>>> a07a9a2 (Favourite feature with tests)
});

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'publicArticle'])->name("public_article");

Auth::routes();
