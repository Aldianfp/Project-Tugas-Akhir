<?php

use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\TentangPerusahaanController;
use App\Http\Controllers\Admin\PemasukanController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\PeralatanController;
use App\Http\Controllers\Admin\PersonilController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ProyekController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\PortofolioGambarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\HelpdeskController;

use App\Http\Controllers\PortofolioController as ControllersPortofolioController;
use App\Http\Controllers\ProfilePerusaahaanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

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


Auth::routes();

// Route::get('/', function)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontak', [\App\Http\Controllers\KontakController::class, 'index'])->name('kontak');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/portofolio', [ControllersPortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/portofolio/{id}', [ControllersPortofolioController::class, 'show'])->name('portofolio.show');
Route::get('/profile-perusahaan', [ProfilePerusaahaanController::class, 'index'])->name('profile-perusaahaan');
Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk.user');
Route::get('/cektiket', [HelpdeskController::class, 'cektiket'])->name('helpdesk.cektiket');
Route::post('/helpdesksimpanuser', [HelpdeskController::class, 'simpanuser'])->name('helpdesk.simpanuser');
Route::post('/prosescektiket', [HelpdeskController::class, 'prosescektiket'])->name('helpdesk.prosescektiket');

// admin
Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // roles
    Route::resource('roles', RoleController::class)->except('show');
    // permissions
    Route::resource('permissions', PermissionController::class)->except('show');
    // proyek
    Route::resource('company', TentangPerusahaanController::class);
    Route::resource('proyek', ProyekController::class);
    Route::resource('merk', MerkController::class);
    Route::resource('type', TypeController::class);
    Route::resource('peralatan', PeralatanController::class);
    Route::resource('personil', PersonilController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('kontak', [KontakController::class, 'update'])->name('kontak.update');
    Route::resource('portofolio', PortofolioController::class);
    Route::get('portofolio-gambar', [PortofolioGambarController::class, 'index'])->name('portofolio-gambar.index');
    Route::get('portofolio-gambar/create', [PortofolioGambarController::class, 'create'])->name('portofolio-gambar.create');
    Route::post('portofolio-gambar/create', [PortofolioGambarController::class, 'store'])->name('portofolio-gambar.store');
    Route::delete('portofolio-gambar/delete', [PortofolioGambarController::class, 'destroy'])->name('portofolio-gambar.destroy');

    Route::get('laporan/keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan.index');
    Route::get('/laporan-keuangan/preview', [LaporanKeuanganController::class, 'preview'])->name('laporan-keuangan.preview');
    Route::get('/laporan-keuangan/print', [LaporanKeuanganController::class, 'print'])->name('laporan-keuangan.print');

    Route::get('adminindex', [HelpdeskController::class, 'adminindex'])->name('helpdesk.adminindex');
    Route::get('adminjawabtiket/{id}', [HelpdeskController::class, 'adminjawabtiket'])->name('helpdesk.adminjawabtiket');
    Route::put('respontiket', [HelpdeskController::class, 'respontiket'])->name('helpdesk.respontiket');


    // Password Reset Routes
    Route::get('forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
    // Route::get('show-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showPassword'])->name('password.show');
    Route::post('admin-forgot-password', [App\Http\Controllers\AdminController::class, 'forgotPassword'])->name('admin.forgot-password');
});
