<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RajalMRController;
use App\Http\Controllers\RajalICDController;
use App\Http\Controllers\RajalKarcisController;
use App\Http\Controllers\RajalJaminanController;
use App\Http\Controllers\RajalLayananController;
use App\Http\Controllers\RajalPeriksaController;
use App\Http\Controllers\RajalKaryawanController;
use App\Http\Controllers\RajalPembayaranController;
use App\Http\Controllers\RajalRegistrasiController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::group(['prefix' => 'karyawan', 'as' => 'karyawan.'], function () {

    route::get('/', [RajalKaryawanController::class, 'index'])->name('index');
});

route::group(['prefix' => 'jaminan', 'as' => 'jaminan.'], function () {

    route::get('/', [RajalJaminanController::class, 'index'])->name('index');
    route::get('/view', [RajalJaminanController::class, 'view'])->name('view');
});

route::group(['prefix' => 'layanan', 'as' => 'layanan.'], function () {

    route::get('/', [RajalLayananController::class, 'index'])->name('index');
    route::get('/view', [RajalLayananController::class, 'view'])->name('view');
});

route::group(['prefix' => 'icd', 'as' => 'icd.'], function () {

    route::get('/', [RajalICDController::class, 'index'])->name('index');
    route::get('/view', [RajalICDController::class, 'view'])->name('view');
});

route::group(['prefix' => 'karcis', 'as' => 'karcis.'], function () {

    route::get('/', [RajalKarcisController::class, 'index'])->name('index');
    route::get('/view', [RajalKarcisController::class, 'view'])->name('view');
});

route::group(['prefix' => 'mr', 'as' => 'mr.'], function () {

    route::get('/', [RajalMRController::class, 'index'])->name('index');
});

route::group(['prefix' => 'registrasi', 'as' => 'registrasi.'], function () {

    route::get('/', [RajalRegistrasiController::class, 'index'])->name('index');
});

route::group(['prefix' => 'periksa', 'as' => 'periksa.'], function () {

    route::get('/', [RajalPeriksaController::class, 'index'])->name('index');
});

route::group(['prefix' => 'pembayaran', 'as' => 'pembayaran.'], function () {

    route::get('/', [RajalPembayaranController::class, 'index'])->name('index');
});
