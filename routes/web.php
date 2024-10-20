<?php

use App\Http\Controllers\KakaoController;
use App\Http\Controllers\KaretController;
use App\Http\Controllers\KelapaController;
use App\Http\Controllers\KopiController;
use App\Http\Controllers\SawitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DataProduksiController;
use App\Http\Controllers\DataGrafikController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rute utama (halaman welcome)
Route::get('/', function () {
    return view('welcome');
});

// Rute logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Rute untuk ganti password
Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('password.change.update');

// Grup rute untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    
    // Route untuk menampilkan formulir pembuatan user
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/index', [UserController::class, 'index'])->name('admin.users.index');

    // Route CRUD untuk tanaman (hanya admin)
    Route::resources([
        'kakao' => KakaoController::class,
        'sawit' => SawitController::class,
        'karet' => KaretController::class,
        'kelapa' => KelapaController::class,
        'kopi' => KopiController::class,
    ]);

    // Route untuk mengelola Data Produksi (hanya admin)
    Route::get('/data-produksi/create', [DataProduksiController::class, 'create'])->name('data-produksi.create');
    Route::post('/data-produksi', [DataProduksiController::class, 'store'])->name('data-produksi.store');
    Route::resource('data-produksi', DataProduksiController::class);
});

// Grup rute untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    // Dashboard user
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    // Route untuk melihat Data Produksi (tanpa akses CRUD)
    Route::get('/data-produksi', [DataProduksiController::class, 'index'])->name('data-produksi.index');
});

// Rute yang bisa diakses oleh admin dan user
Route::middleware('auth')->group(function () {
    // Melihat data tanaman untuk admin dan user
    Route::get('/kakao', [KakaoController::class, 'index'])->name('kakao.index');
    Route::get('/sawit', [SawitController::class, 'index'])->name('sawit.index');
    Route::get('/karet', [KaretController::class, 'index'])->name('karet.index');
    Route::get('/kelapa', [KelapaController::class, 'index'])->name('kelapa.index');
    Route::get('/kopi', [KopiController::class, 'index'])->name('kopi.index');

    // Melihat Data Produksi (semua pengguna dapat mengakses)
    Route::get('/data-produksi', [DataProduksiController::class, 'index'])->name('data-produksi.index');

});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/data-grafik', [DataGrafikController::class, 'index'])->name('data-grafik.index');
Route::get('/kakao/export/pdf', [KakaoController::class, 'exportPdf'])->name('kakao.export.pdf');
Route::get('/kakao/export/csv', [KakaoController::class, 'exportCsv'])->name('kakao.export.csv');
Route::get('/karet/export/pdf', [KaretController::class, 'exportPdf'])->name('karet.export.pdf');
Route::get('/karet/export/csv', [KaretController::class, 'exportCsv'])->name('karet.export.csv');
Route::get('/kelapa/export/pdf', [KelapaController::class, 'exportPdf'])->name('kelapa.export.pdf');
Route::get('/kelapa/export/csv', [KelapaController::class, 'exportCsv'])->name('kelapa.export.csv');
Route::get('/kopi/export/pdf', [KopiController::class, 'exportPdf'])->name('kopi.export.pdf');
Route::get('/kopi/export/csv', [KopiController::class, 'exportCsv'])->name('kopi.export.csv');
Route::get('/sawit/export/pdf', [SawitController::class, 'exportPdf'])->name('sawit.export.pdf');
Route::get('/sawit/export/csv', [SawitController::class, 'exportCsv'])->name('sawit.export.csv');


// Autentikasi route default Laravel
Auth::routes();
