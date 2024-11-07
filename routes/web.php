<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BahanKimiaController;
use App\Http\Controllers\BahanKimiaOpController;
use App\Http\Controllers\JenisBahanKimiaController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\KualitasAirController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ReservoarController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KalibrasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StandMeterController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/redirect', [DashboardController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('permission', PermissionController::class);
    Route::resource('bahanKimia', BahanKimiaController::class);
    Route::resource('jenisBahanKimia', JenisBahanKimiaController::class);
    Route::resource('vendorBarang', VendorController::class);
    Route::resource('kualitasAir', KualitasAirController::class);
    Route::resource('kalibrasi', KalibrasiController::class);
    Route::resource('reservoar', ReservoarController::class);
    Route::resource('standMeter', StandMeterController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::get('laporan', [ReportController::class, 'index'])->name('report.index');
    Route::post('download-laporan', [ReportController::class, 'report'])->name('report.download');

    Route::middleware('role:user')->group(function () {
        Route::resource('bahanKimiaOp', BahanKimiaOpController::class);
    });
});
