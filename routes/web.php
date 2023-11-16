<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dashboard\auth\test;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InstansiController;
use App\Http\Controllers\Dashboard\OperationalController;
use App\Http\Controllers\dashboard\PekerjaanController;
use App\Http\Controllers\Dashboard\purchaseController;
use App\Http\Controllers\Dashboard\summaryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WorkOrderController;
use App\Http\Controllers\Dashboard\TemporaryFilesController;
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
Route::middleware(['auth'])->group(function () {
    // halaman utama dashboard setelah login
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/getProyek', [HomeController::class, 'getProyek'])->name('getProyek');
    Route::get('/getOperational', [HomeController::class, 'getOperational'])->name('getOperational');
    Route::get('/api', [HomeController::class, 'api'])->name('api');

    // halaman kelola user khusus finance dan manager
    Route::middleware(['role:finance|manager'])->group(function () {
        // halaman manajemen user
        Route::resource('manage-users', UserController::class)->except(['show']);
        // halaman manajemen instansi
        Route::resource('instansi', InstansiController::class);
    });
    // route Pekerjaan
    Route::resource('pekerjaan', PekerjaanController::class);

    //halaman Work Order
    Route::resource('workOrder', WorkOrderController::class)->names([
        'index' => 'workOrder',
        'create' => 'workOrder.create',
        'store' => 'workOrder.store',
        'edit' => 'workOrder.edit',
        'update' => 'workOrder.update',
        'destroy' => 'workOrder.destroy',
    ])->except(['show']);
    Route::get('/workOrder/{id}/detail', [WorkOrderController::class, 'detail'])->name('detailWorkOrder');
    Route::get('/workOrder/{id}/jadwal', [WorkOrderController::class, 'jadwal'])->name('jadwal');
    Route::get('/workOrder/{id}/purchaseRequest', [WorkOrderController::class, 'purchaseRequest'])->name('purchaseRequest');
    Route::get('/workOrder/{id}/add-pr-item', [WorkOrderController::class, 'addPrItem'])->name('addPrItem');
    Route::get('/workOrder/{id}/checklist', [WorkOrderController::class, 'checklist'])->name('checklist');
    Route::get('/workOrder/{id}/qcPass', [WorkOrderController::class, 'qcPass'])->name('qcPass');
    Route::get('/workOrder/{id}/persuratan', [WorkOrderController::class, 'persuratan'])->name('persuratan');
    // Route::post('/load-jadwal', [WorkOrderController::class, 'handleJadwal'])->name('handleJadwal');
    // Route::get('/purchaseRequest', [WorkOrderController::class, 'purchaseRequest'])->name('purchaseRequest');
    // Route::get('/add-pr-item', [WorkOrderController::class, 'addPrItem'])->name('addPrItem');
    // Route::get('/checklist', [WorkOrderController::class, 'checklist'])->name('checklist');
    // Route::post('/load-checklist', [WorkOrderController::class, 'handleChecklist'])->name('handleChecklist');
    // Route::get('/qcPass', [WorkOrderController::class, 'qcPass'])->name('qcPass');
    // Route::post('/load-qcPass', [WorkOrderController::class, 'handleQCPass'])->name('handleQCPass');
    // Route::get('/persuratan', [WorkOrderController::class, 'persuratan'])->name('persuratan');
    // Route::get('/add-persuratan', [WorkOrderController::class, 'addPersuratan'])->name('addPersuratan');
    // Route::post('/load-persuratan', [WorkOrderController::class, 'handlePersuratan'])->name('handlePersuratan');

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

    Route::resource('purchase', PurchaseController::class)->names([
        'index' => 'purchase',
        'create' => 'purchase.create',
        'store' => 'purchase.store',
        'edit' => 'purchase.edit',
        'update' => 'purchase.update',
        'destroy' => 'purchase.destroy',
    ])->except(['show']);
    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // route untuk handle file upload temporary digunakan filepond
    Route::post('/upload', [TemporaryFilesController::class, 'store'])->name('file.upload');
    Route::delete('/upload', [TemporaryFilesController::class, 'destroy'])->name('file.destroy');

    // Route::resource('/test', test::class);
});
