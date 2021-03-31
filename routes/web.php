<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

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


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/user', function () {
    dump(Auth::user()->user_type);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
require __DIR__ . '/frontEnd.php';
require __DIR__ . '/adminAuth.php';
require __DIR__ . '/backEnd.php';







/* Route::get('/', [LandingPageController::class, 'index']);
Route::get('articles/{id?}', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('want-to-comment', [CommentController::class, 'store'])->name('comment.store'); */