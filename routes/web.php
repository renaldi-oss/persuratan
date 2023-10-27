<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;

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
Route::get('/', function () {
    return view('auth.login');
});
route::post('/login', [authController::class, 'authenticate'])->name('login');

// LOGOUT
route::post('/logout', [authController::class, 'logout'])->name('logout');


// DASHBOARD
route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard.index');
    })->name('dashboard');
});