<?php

use App\Http\Controllers\AdminGuestAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminGuestAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminGuestAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminGuestAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminGuestAuth\NewPasswordController;
use App\Http\Controllers\AdminGuestAuth\PasswordController;
use App\Http\Controllers\AdminGuestAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminGuestAuth\RegisteredUserController;
use App\Http\Controllers\AdminGuestAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin_guest')->group(function () {

    Route::get('admin_guest/admin-login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin_guest.admin-login');

    Route::post('admin_guest/admin-login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin_guest/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::middleware('auth:admin_guest')->group(function () {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin_guest/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin_guest.logout');
});
