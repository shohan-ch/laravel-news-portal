<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;



Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth:admin']], function () {
    Route::resource('post', ArticleController::class);
    Route::resource('category', CategoryController::class);
});


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(['admin.auth:admin']);