<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\dashboard\homeController;
use App\Http\Controllers\dashboard\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// LOGIN
Route::middleware('guest')->group(function () {
    // halaman login untuk semua user ketika belum login
    Route::get('/login', [authController::class, 'index'])->name('login');
    // proses login
    Route::post('/login', [authController::class, 'authenticate'])->name('login.store');

    // auto login berdasarkan role DEVELOPMENT ONLY
    Route::get('/auto-login/{role}', [authController::class, 'autoLogin'])->name('auto-login');
});

// DASHBOARD
route::middleware(['auth'])->group(function() {
    // halaman utama dashboard setelah login
    Route::get('/', [homeController::class, 'index'])->name('home');
    // halaman kelola user khusus admin dan manager
    Route::middleware(['role:admin|manager'])->group(function() {
        // halaman manajemen user
        Route::resource('manage-users', userController::class)->names([
            'index' => 'manage-users',
            'create' => 'manage-users.create',
            'store' => 'manage-users.store',
            'edit' => 'manage-users.edit',
            'update' => 'manage-users.update',
            'destroy' => 'manage-users.destroy',
        ])->except(['show']);
    });

    // LOGOUT
    route::post('/logout', [authController::class, 'logout'])->name('logout');
});
