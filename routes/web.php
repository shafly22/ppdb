<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\Admin\PembayaranPpdbController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\admin\PembayaranSppController;
use App\Http\Controllers\admin\PPDBController;
use App\Http\Controllers\admin\SiswaController;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route untuk autentikasi (guest)
Route::middleware(['guest'])->group(function () {
    Route::get('', [AuthController::class, 'index'])->name('login');
    Route::post('', [AuthController::class, 'login'])->name('login.post');
});
Route::get('home', function(){
    return redirect('/admin');

});

// Route untuk halaman admin setelah login (auth)
Route::middleware(['auth'])->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin')->name('dashboard');
Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin')->name('dashboard.admin');
Route::get('/guru', [AdminController::class, 'guru'])->middleware('userAkses:guru')->name('dashboard.guru');
Route::get('/siswa', [AdminController::class, 'siswa'])->middleware('userAkses:siswa')->name('dashboard.siswa');
Route::get('/kepsek', [AdminController::class, 'kepsek'])->middleware('userAkses:kepsek')->name('dashboard.kepsek');

Route::get('/logout', [LogoutController::class, 'logout']);
});


Route::controller(SiswaController::class)->prefix('siswa')->group(function(){
    Route::get('', 'index')->name('siswa');
    Route::get('insert', 'add')->name('siswa.insert');
    Route::post('insert', 'insert')->name('siswa.add.insert');
});

Route::controller(GuruController::class)->prefix('guru')->group(function(){
    Route::get('', 'index')->name('guru');
    Route::get('insert', 'add')->name('guru.insert');
    Route::post('insert', 'insert')->name('guru.add.insert');
});

//CRUD GURU
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('fe.admin.guru.edit');
Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('fe.admin.guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'delete'])->name('fe.admin.guru.delete');
Route::get('/admin/guru', [GuruController::class, 'index'])->name('fe.admin.guru.index');
//CRUD SISWA
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('fe.admin.siswa.edit');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('fe.admin.siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'delete'])->name('fe.admin.siswa.delete');
Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('fe.admin.siswa.index');


//Pembayaran SPP
Route::prefix('admin/pembayaranspp')->name('fe.admin.pembayaranspp.')->group(function () {
    Route::get('', [PembayaranSppController::class, 'index'])->name('index');
    Route::get('create', [PembayaranSppController::class, 'create'])->name('create');
    Route::post('', [PembayaranSppController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PembayaranSppController::class, 'edit'])->name('edit');
    Route::put('{id}', [PembayaranSppController::class, 'update'])->name('update');
    Route::delete('{id}', [PembayaranSppController::class, 'destroy'])->name('destroy');
});

// Route untuk PPDB
Route::prefix('admin/ppdb')->name('fe.admin.ppdb.')->group(function () {
    Route::get('', [PPDBController::class, 'index'])->name('index');
    Route::get('create', [PPDBController::class, 'create'])->name('create');
    Route::post('', [PPDBController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PPDBController::class, 'edit'])->name('edit'); // Route ini harus ada
    Route::put('{id}', [PPDBController::class, 'update'])->name('update');
    Route::delete('{id}', [PPDBController::class, 'destroy'])->name('destroy'); // Route ini juga harus ada
});

Route::prefix('admin/pembayaranppdb')->name('fe.admin.pembayaranppdb.')->group(function () {
    Route::get('', [PembayaranPpdbController::class, 'index'])->name('index');
    Route::get('create', [PembayaranPpdbController::class, 'create'])->name('create');
    Route::post('', [PembayaranPpdbController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PembayaranPpdbController::class, 'edit'])->name('edit');
    Route::put('{id}', [PembayaranPpdbController::class, 'update'])->name('update');
    Route::delete('{id}', [PembayaranPpdbController::class, 'destroy'])->name('destroy');
});




