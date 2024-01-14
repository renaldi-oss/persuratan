<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\ChecklistController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InstansiController;
use App\Http\Controllers\dashboard\JadwalController;
use App\Http\Controllers\dashboard\kodeSuratController;
use App\Http\Controllers\dashboard\MaterialController;
use App\Http\Controllers\Dashboard\OperationalController;
use App\Http\Controllers\dashboard\PekerjaanController;
use App\Http\Controllers\dashboard\purchaseController;
use App\Http\Controllers\Dashboard\QualityControlController;
use App\Http\Controllers\Dashboard\summaryController;
use App\Http\Controllers\Dashboard\suratController;
use App\Http\Controllers\Dashboard\TemporaryFilesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\UserProfileController;
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
    Route::post('workorder/set-active-tab', [workorderController::class, 'navigasi'])->name('workorder.navigasi');

    //route Jadwal
    Route::resource('jadwal', JadwalController::class)->except(['create']);
    // route quality control
    Route::resource('quality-control', QualityControlController::class)->except(['show']);
    
    Route::resource('surat', suratController::class);
    Route::get('ajax-surat', [suratController::class, 'ajaxsurat'])->name('ajax-surat');
    
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

    Route::resource('purchase', purchaseController::class)->names([
        'index' => 'purchase',
        'create' => 'purchase.create',
        'store' => 'purchase.store',
        'edit' => 'purchase.edit',
        'update' => 'purchase.update',
        'destroy' => 'purchase.destroy',
    ])->except(['show']);

    Route::resource('material', MaterialController::class)->except(['show']);
    Route::get('ajax-material', [MaterialController::class, 'ajaxmaterial'])->name('ajax-material');
    Route::resource('checklist', ChecklistController::class);
    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // route untuk handle file upload temporary digunakan filepond
    Route::post('/upload', [TemporaryFilesController::class, 'store'])->name('tempfile.upload');
    Route::delete('/upload', [TemporaryFilesController::class, 'destroy'])->name('tempfile.destroy');

    // route Pekerjaan
    Route::resource('kodeSurat', kodeSuratController::class);

    //  Route::get('kodeSurat/create', 'KodeSuratController@create')->name('kodeSurat.create');
    //  Route::get('kodeSurat/form', 'KodeSuratController@form')->name('kodeSurat.form');
    // Route::get('/dashboard/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
});
