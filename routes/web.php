<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\dashboard\homeController;
use App\Http\Controllers\dashboard\userController;
use App\Http\Controllers\dashboard\workOrderController;

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
    Route::get('/login', [authController::class, 'index'])->name('login');
    Route::post('/login', [authController::class, 'authenticate'])->name('login.store');

    // auto login berdasarkan role DEVELOPMENT ONLY
    Route::get('/auto-login/{role}', [authController::class, 'autoLogin'])->name('auto-login');
});

// DASHBOARD
route::middleware(['auth'])->group(function() {
    // halaman utama dashboard setelah login
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::middleware(['role:admin|manager'])->group(function() {
        // halaman manajemen user
        Route::resource('manage-user', userController::class)->names([
            'index' => 'manage-user',
            'create' => 'manage-user.create',
            'store' => 'manage-user.store',
            'edit' => 'manage-user.edit',
            'update' => 'manage-user.update',
            'destroy' => 'manage-user.destroy',
        ])->except(['show']);
    });
    //halaman Work Order
    Route::get('/workOrder', [workOrderController::class, 'index'])->name('workOrder');
    Route::get('/workOrder/detail', [workOrderController::class, 'detail'])->name('detailWorkOrder');
    Route::get('/workOrder/detail/jadwal', [workOrderController::class, 'jadwal'])->name('jadwal');

    // LOGOUT
    route::post('/logout', [authController::class, 'logout'])->name('logout');
});
