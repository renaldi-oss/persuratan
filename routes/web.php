<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OperationalController;
use App\Http\Controllers\Dashboard\PurchaseController;// Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// LOGIN
Route::middleware('guest')->group(function () {
    // halaman login untuk semua user ketika belum login
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    // proses login
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.store');

    // auto login berdasarkan role DEVELOPMENT ONLY
    Route::get('/auto-login/{role}', [AuthController::class, 'autoLogin'])->name('auto-login');

});

// DASHBOARD
Route::middleware(['auth'])->group(function() {
    // halaman utama dashboard setelah login
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // halaman kelola user khusus admin dan manager
    Route::middleware(['role:admin|manager'])->group(function() {
        // halaman manajemen user
        Route::resource('manage-users', UserController::class)->names([
            'index' => 'manage-users',
            'create' => 'manage-users.create',
            'store' => 'manage-users.store',
            'edit' => 'manage-users.edit',
            'update' => 'manage-users.update',
            'destroy' => 'manage-users.destroy',
        ])->except(['show']);

        // Tambahkan rute untuk Operational request
        Route::resource('operational', OperationalController::class)->names([
            'index' => 'operational',
            'create' => 'operational.create',
            'store' => 'operational.store',
            'edit' => 'operational.edit',
            'update' => 'operational.update',
            'destroy' => 'operational.destroy',
        ])->except(['show']);

        // Tambahkan rute untuk purchase order
        Route::resource('purchase', purchaseController::class)->names([
            'index' => 'purchase',
            'create' => 'purchase.create',
            'store' => 'purchase.store',
            'edit' => 'purchase.edit',
            'update' => 'purchase.update',
            'destroy' => 'purchase.destroy',
        ])->except(['show']);


        // LOGOUT
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
