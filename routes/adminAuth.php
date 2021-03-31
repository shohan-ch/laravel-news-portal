<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Route::get('/admin/register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest:admin')
//     ->name('admin.register');

// Route::post('/admin/register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest:admin');

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('admin.guest:admin')
    ->name('admin.login');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('admin.guest:admin');

Route::get('/admin/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('admin.guest:admin')
    ->name('admin.password.request');

Route::post('/admin/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('admin.guest:admin')
    ->name('admin.password.email');

Route::get('/admin/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('admin.guest:admin')
    ->name('admin.password.reset');

Route::post('/admin/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('admin.guest:admin')
    ->name('admin.password.update');


// Route::get('/admin/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//     ->middleware('admin.auth')
//     ->name('verification.notice');

// Route::get('/admin/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//     ->middleware(['admin.auth', 'signed', 'throttle:6,1'])
//     ->name('verification.verify');

// Route::post('/admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//     ->middleware(['admin.auth', 'throttle:6,1'])
//     ->name('verification.send');

// Route::get('/admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
//     ->middleware('admin.auth')
//     ->name('password.confirm');

// Route::post('/admin/confirm-password', [ConfirmablePasswordController::class, 'store'])
//     ->middleware('admin.auth');

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('admin.auth:admin')
    ->name('admin.logout');