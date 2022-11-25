<?php

use App\Models\DaftarPelanggaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TheClassController;
use App\Http\Controllers\DaftarPelanggaranController;

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
//Guest
Route::get('/', [MyController::class, 'guest']);
Route::get('/user/about', [MyController::class, 'guest_about']);

// admin router
Route::get('/login',[MyController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/nama',[MyController::class, 'nama']);

Route::get('/admin/home', [MyController::class, 'home'])->middleware('auth');

Route::get('/admin/kategori-pelanggaran', [MyController::class, 'ketegori_pelanggaran'])->middleware('auth');
Route::post('/admin/kategori-pelanggaran', [KategoriController::class, 'kategori']);
Route::put('/admin/kategori-pelanggaran/{kategori}', [KategoriController::class, 'update']);
Route::delete('/admin/kategori-pelanggaran/{kategori}', [KategoriController::class, 'destroy']);

Route::get('/admin/pelanggaran-siswa', [MyController::class, 'pelanggaran_siswa'])->middleware('auth');
Route::post('/admin/pelanggaran-siswa', [DaftarPelanggaranController::class, 'store'])->middleware('auth');
Route::delete('/admin/pelanggaran-siswa/{pelanggaran}', [DaftarPelanggaranController::class, 'destroy'])->middleware('auth');
Route::put('/admin/pelanggaran-siswa/{pelanggaran}', [DaftarPelanggaranController::class, 'update'])->middleware('auth');
Route::get('/admin/pelanggaran-siswa/print/{pelanggaran}', [DaftarPelanggaranController::class, 'each_print'])->middleware('auth');

Route::get('/admin/daftar-kelas', [MyController::class, 'daftar_kelas'])->middleware('auth');
Route::post('/admin/daftar-kelas', [TheClassController::class, 'create']);
Route::delete('/admin/daftar-kelas/{kelas}', [TheClassController::class, 'destroy']);
Route::put('/admin/daftar-kelas/{kelas}', [TheClassController::class, 'update']);


Route::get('/admin/daftar-siswa', [MyController::class, 'daftar_siswa'])->middleware('auth');
Route::post('/admin/daftar-siswa', [StudentController::class, 'create']);
Route::get('/admin/edit-siswa/{student}', [Mycontroller::class, 'edit_siswa'])->middleware('auth');
Route::put('/admin/edit-siswa/{student}', [StudentController::class, 'update']);
Route::delete('/admin/daftar-siswa/{student}', [StudentController::class, 'destroy']);

Route::get('/admin/daftar-user', [MyController::class, 'daftar_user'])->middleware('auth');
Route::post('/admin/daftar-user', [UserController::class, 'create_user']);
Route::delete('/admin/daftar-user/{user}', [UserController::class, 'destroy']);
Route::put('/admin/daftar-user/{user}', [UserController::class, 'edit']);

Route::get('/admin/daftar-admin', [MyController::class, 'daftar_admin'])->middleware('auth');
Route::post('/admin/daftar-admin', [UserController::class, 'create_admin']);
Route::delete('/admin/daftar-admin/{user}', [UserController::class, 'destroy']);
Route::put('/admin/daftar-admin/{user}', [UserController::class, 'edit']);

// User router
Route::get('/user', function () {
    return view('welcome');
});
Route::get('/user/home', [MyController::class, 'user_home']);

Route::get('/user/tambah-pelanggaran', [MyController::class, 'user_tambah_pelanggaran']);
Route::post('/user/tambah-pelanggaran', [DaftarPelanggaranController::class, 'store'])->middleware('auth');;

Route::get('/user/history', [MyController::class, 'user_history']);
Route::delete('/user/history/{pelanggaran}', [DaftarPelanggaranController::class, 'destroy'])->middleware('auth');
Route::put('/user/history/{pelanggaran}', [DaftarPelanggaranController::class, 'update'])->middleware('auth');

Route::get('/user/settings', [MyController::class, 'user_settings']);
Route::put('/user/settings/{user}', [UserController::class, 'edit']);

