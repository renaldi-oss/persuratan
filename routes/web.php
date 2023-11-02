<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InstansiController;
use App\Http\Controllers\Dashboard\OperationalController; 
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WorkOrderController;
use Illuminate\Support\Facades\Route;


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
    Route::get('/', [HomeController::class, 'index'])->name('index');
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

        // halaman manajemen instansi
        Route::resource('instansi', InstansiController::class);

        // Tambahkan rute untuk data dashboard
        Route::get('/getProyek', [HomeController::class, 'getProyek'])->name('getProyek');
        Route::get('/getOperational', [HomeController::class, 'getOperational'])->name('getOperational');
    });
    //halaman Work Order
    Route::get('/workOrder', [WorkOrderController::class, 'index'])->name('workOrder');
    Route::get('/workOrder/detail', [WorkOrderController::class, 'detail'])->name('detailWorkOrder');

    Route::get('/jadwal', [WorkOrderController::class, 'jadwal'])->name('jadwal');
    Route::post('/load-jadwal', [WorkOrderController::class, 'handleJadwal'])->name('handleJadwal');
    Route::get('/purchaseRequest', [WorkOrderController::class, 'purchaseRequest'])->name('purchaseRequest');
    Route::post('/load-purchaseRequest', [WorkOrderController::class, 'handlePurchaseRequest'])->name('handlePurchaseRequest');
    Route::get('/checklist', [WorkOrderController::class, 'checklist'])->name('checklist');
    Route::post('/load-checklist', [WorkOrderController::class, 'handleChecklist'])->name('handleChecklist');
    Route::get('/qcPass', [WorkOrderController::class, 'qcPass'])->name('qcPass');
    Route::post('/load-qcPass', [WorkOrderController::class, 'handleQCPass'])->name('handleQCPass');
    Route::get('/persuratan', [WorkOrderController::class, 'persuratan'])->name('persuratan');
    Route::post('/load-persuratan', [WorkOrderController::class, 'handlePersuratan'])->name('handlePersuratan');
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
