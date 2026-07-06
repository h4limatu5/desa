<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminResidentController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('residents', AdminResidentController::class);
});

