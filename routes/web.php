<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InstansiController;
use App\Http\Controllers\Dashboard\OperationalController;
use App\Http\Controllers\dashboard\PekerjaanController;
use App\Http\Controllers\Dashboard\purchaseController;
use App\Http\Controllers\Dashboard\summaryController;
use App\Http\Controllers\Dashboard\TemporaryFilesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WorkOrderController;
use App\Http\Controllers\Dashboard\UserProfileController;
use App\Http\Controllers\dashboard\MaterialController;
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
    Route::get('pekerjaan/file/{media}', [PekerjaanController::class, 'download'])->name('pekerjaan.download');
    Route::get('pekerjaan/file/{pekerjaan}/downloadAll', [PekerjaanController::class, 'downloadAll'])->name('pekerjaan.downloadAll');
    Route::delete('pekerjaan/file/{media}', [PekerjaanController::class, 'deletefile'])->name('pekerjaan.delete');

    //route Work Order
    Route::resource('workorder', workorderController::class)->except(['create', 'edit', 'update', 'destroy','store']);
    // route livewire work order
    // Route::get('/workorder/{id}/detail', [workorderController::class, 'detail'])->name('detailworkorder');
    // Route::get('/workorder/{id}/jadwal', [workorderController::class, 'jadwal'])->name('jadwal');
    // Route::get('/workorder/{id}/purchaseRequest', [workorderController::class, 'purchaseRequest'])->name('purchaseRequest');
    // Route::get('/workorder/{id}/add-pr-item', [workorderController::class, 'addPrItem'])->name('addPrItem');
    // Route::get('/workorder/{id}/checklist', [workorderController::class, 'checklist'])->name('checklist');
    // Route::get('/workorder/{id}/qcPass', [workorderController::class, 'qcPass'])->name('qcPass');
    // Route::get('/workorder/{id}/persuratan', [workorderController::class, 'persuratan'])->name('persuratan');
    // Route::post('/load-jadwal', [workorderController::class, 'handleJadwal'])->name('handleJadwal');
    // Route::get('/purchaseRequest', [workorderController::class, 'purchaseRequest'])->name('purchaseRequest');
    // Route::get('/add-pr-item', [workorderController::class, 'addPrItem'])->name('addPrItem');
    // Route::get('/checklist', [workorderController::class, 'checklist'])->name('checklist');
    // Route::post('/load-checklist', [workorderController::class, 'handleChecklist'])->name('handleChecklist');
    // Route::get('/qcPass', [workorderController::class, 'qcPass'])->name('qcPass');
    // Route::post('/load-qcPass', [workorderController::class, 'handleQCPass'])->name('handleQCPass');
    // Route::get('/persuratan', [workorderController::class, 'persuratan'])->name('persuratan');
    // Route::get('/add-persuratan', [workorderController::class, 'addPersuratan'])->name('addPersuratan');
    // Route::post('/load-persuratan', [workorderController::class, 'handlePersuratan'])->name('handlePersuratan');

    //halaman summary
    Route::get('/summary', [summaryController::class, 'index'])->name('summary.index');
    Route::get('/summary/downloadAll', [summaryController::class, 'downloadAll'])->name('summary.downloadAll');

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

    Route::resource('material', MaterialController::class)->names([
        'index' => 'material',
        'create' => 'material.create',
        'store' => 'material.store',
        'edit' => 'material.edit',
        'update' => 'material.update',
        'destroy' => 'material.destroy',
    ])->except(['show']);
    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // route untuk handle file upload temporary digunakan filepond
    Route::post('/upload', [TemporaryFilesController::class, 'store'])->name('tempfile.upload');
    Route::delete('/upload', [TemporaryFilesController::class, 'destroy'])->name('tempfile.destroy');

    Route::get('/dashboard/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
});
