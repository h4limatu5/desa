<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminResidentController;
use App\Http\Controllers\AdminLetterController;
use App\Http\Controllers\AdminComplaintController;

Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('residents', AdminResidentController::class);
        Route::resource('complaints', AdminComplaintController::class)->only(['index', 'show', 'update']);

        // Surat Mandiri (verifikasi admin/operator)
        Route::get('/letters', [AdminLetterController::class, 'index'])->name('letters.index');
        Route::post('/letters/{letter}/approve', [AdminLetterController::class, 'approve'])->name('letters.approve');
        Route::post('/letters/{letter}/reject', [AdminLetterController::class, 'reject'])->name('letters.reject');
        Route::post('/letters/{letter}/processed', [AdminLetterController::class, 'processed'])->name('letters.processed');
        Route::get('/letters/{letter}/download', [AdminLetterController::class, 'download'])->name('letters.download');
    });


