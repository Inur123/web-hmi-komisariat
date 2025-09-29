<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\KaderController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\User\PenaKaderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Posts\PenulisController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\Admin\Setting\PeriodeController;
use App\Http\Controllers\Admin\Setting\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class)
        ->only(['edit','update'])
        ->parameters(['profile' => 'id']); // atau bisa []
    // Alumni Management
Route::get('alumni/ketua-umum', [AlumniController::class, 'ketuaUmum'])->name('alumni.ketuaUmum');
Route::resource('alumni', AlumniController::class);

    Route::resource('penulis', PenulisController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('kader', KaderController::class);
    Route::resource('posts', PostController::class);
      Route::delete('posts/images/{id}', [PostController::class, 'deleteImage'])->name('posts.images.delete');
});


Route::get('/pena-kader', [PenaKaderController::class, 'index'])->name('pena-kader.index');
Route::get('/pena-kader/{post:slug}', [PenaKaderController::class, 'show'])->name('pena-kader.show');
