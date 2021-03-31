<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;



Route::get('/', [LandingPageController::class, 'index']);
Route::get('articles/{id?}', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('want-to-comment', [CommentController::class, 'store'])->name('comment.store');