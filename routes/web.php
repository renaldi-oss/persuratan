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
    Route::get('/login', [authController::class, 'index'])->name('login');
    Route::post('/login', [authController::class, 'authenticate'])->name('login.store');

    // login untuk developer
    Route::get('/auto-login', function () {
        $user = App\Models\User::find(1);
        Auth::login($user);
        return redirect()->route('home');
    })->name('auto-login.dev');

});

// DASHBOARD
route::middleware(['auth'])->group(function() {
    // halaman utama setelah login
    Route::get('/', [homeController::class, 'index'])->name('home');

    Route::middleware(['role:admin|manager|super-admin'])->group(function() {
        // halaman manajemen user
        Route::resource('manage-user', userController::class)->names([
            'index' => 'manage-user',
            'create' => 'manage-user.create',
            'store' => 'manage-user.store',
            'show' => 'manage-user.show',
            'edit' => 'manage-user.edit',
            'update' => 'manage-user.update',
            'destroy' => 'manage-user.destroy',
        ]);

    });

    // LOGOUT
    route::post('/logout', [authController::class, 'logout'])->name('logout');
});