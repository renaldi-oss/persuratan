<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\dashboard\homeController;
use App\Http\Controllers\dashboard\userController;
use App\Http\Controllers\dashboard\workOrderController;
use App\Http\Controllers\dashboard\summaryController;
use App\Http\Controllers\Dashboard\OperationalController; // Tambahkan ini

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
    // halaman kelola user khusus finance dan manager
    Route::middleware(['role:finance|manager'])->group(function() {
        // halaman manajemen user
        Route::resource('manage-users', UserController::class)->names([
            'index' => 'manage-users',
            'create' => 'manage-users.create',
            'store' => 'manage-users.store',
            'edit' => 'manage-users.edit',
            'update' => 'manage-users.update',
            'destroy' => 'manage-users.destroy',
        ])->except(['show']);
    });
    //halaman Work Order
    Route::get('/workOrder', [workOrderController::class, 'index'])->name('workOrder');
    Route::get('/workOrder/detail', [workOrderController::class, 'detail'])->name('detailWorkOrder');
    Route::get('/jadwal', [workOrderController::class, 'jadwal'])->name('jadwal');
    Route::post('/load-jadwal', [workOrderController::class, 'handleJadwal'])->name('handleJadwal');
    Route::get('/purchaseRequest', [workOrderController::class, 'purchaseRequest'])->name('purchaseRequest');
    Route::post('/load-purchaseRequest', [workOrderController::class, 'handlePurchaseRequest'])->name('handlePurchaseRequest');
    Route::get('/add-pr-item', [workOrderController::class, 'addPrItem'])->name('addPrItem');
    Route::get('/checklist', [workOrderController::class, 'checklist'])->name('checklist');
    Route::post('/load-checklist', [workOrderController::class, 'handleChecklist'])->name('handleChecklist');
    Route::get('/qcPass', [workOrderController::class, 'qcPass'])->name('qcPass');
    Route::post('/load-qcPass', [workOrderController::class, 'handleQCPass'])->name('handleQCPass');
    Route::get('/persuratan', [workOrderController::class, 'persuratan'])->name('persuratan');
    Route::post('/load-persuratan', [workOrderController::class, 'handlePersuratan'])->name('handlePersuratan');
    Route::get('/add-persuratan', [workOrderController::class, 'addPersuratan'])->name('addPersuratan');

    //halaman summary
    Route::get('/summary', [summaryController::class, 'index'])->name('summary');
    
    // Tambahkan rute untuk administration
        Route::resource('operational', OperationalController::class)->names([
            'index' => 'operational',
            'create' => 'operational.create',
            'store' => 'operational.store',
            'edit' => 'operational.edit',
            'update' => 'operational.update',
            'destroy' => 'operational.destroy',
        ])->except(['show']);

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
