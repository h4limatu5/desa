<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaLetterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WargaDashboardController;

Route::get('/', [PublicController::class, 'home'])->name('public.home');
Route::get('/profil', [PublicController::class, 'profile'])->name('public.profile');
Route::get('/berita', [PublicController::class, 'newsIndex'])->name('public.news.index');
Route::get('/berita/{news}', [PublicController::class, 'newsShow'])->name('public.news.show');
Route::get('/umkm', [PublicController::class, 'umkmIndex'])->name('public.umkm.index');
Route::get('/umkm/{umkm}', [PublicController::class, 'umkmShow'])->name('public.umkm.show');
Route::get('/apbdes', [PublicController::class, 'budgetIndex'])->name('public.budgets.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('warga')->middleware(['auth', 'role:warga'])->name('warga.')->group(function () {
    Route::get('/dashboard', [WargaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/complaints/create', [WargaDashboardController::class, 'complaintsCreate'])->name('complaints.create');
    Route::post('/complaints', [WargaDashboardController::class, 'complaintsStore'])->name('complaints.store');

    Route::get('/letters/create', [WargaLetterController::class, 'create'])->name('letters.create');
    Route::post('/letters', [WargaLetterController::class, 'store'])->name('letters.store');
    Route::get('/letters/{letter}', [WargaLetterController::class, 'show'])->name('letters.show');
});

require __DIR__ . '/admin.php';