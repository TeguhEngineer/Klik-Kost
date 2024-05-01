<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataKostController;
use App\Http\Controllers\Admin\DataMemberController;
use App\Http\Controllers\Admin\verifikasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\DatakosController;
use App\Http\Controllers\Member\FasilitaskosController;
use App\Http\Controllers\Member\GambarkosController;
use App\Http\Controllers\Member\InputDatakosController;
use App\Http\Controllers\Member\ProfileController;
use App\Http\Controllers\User\DetailkosController;
use App\Http\Controllers\User\FilterkosController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\KampusController;
use App\Http\Controllers\User\KecamatanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/detailkos/{id}', [DetailkosController::class, 'detail_kos']);
Route::get('/kecamatan/{id}', [KecamatanController::class, 'filter_kecamatan']);
Route::get('/kampus/{id}', [KampusController::class, 'filter_kampus']);

Auth::routes();

//Member
Route::middleware('can:member')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
    Route::resource('/datakos', InputDatakosController::class);
    Route::put('/datakost/{id}', [InputDatakosController::class, 'edit_status']);
    Route::resource('/fasilitaskos', FasilitaskosController::class);
    Route::get('/gambarkos', [GambarkosController::class, 'index']);
    Route::post('/gambarkos', [GambarkosController::class, 'gambar']);
    Route::delete('/gambarkos/{id}', [GambarkosController::class, 'delete_gambar']);
    Route::resource('/profil', ProfileController::class);
    Route::put('/editPassword/{id}', [ProfileController::class, 'edit_password']);
    Route::get('/supportCS', [HomeController::class, 'supportCS']);
});

// Admin
Route::middleware('can:admin')->group(function () {
    Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index']);
    Route::get('/verifikasi', [verifikasiController::class, 'index']);
    Route::put('/verifikasi/{id}', [verifikasiController::class, 'update']);
    Route::resource('/datakost', DataKostController::class);
    Route::resource('/dataADM', DataAdminController::class);
    // Fitur dinonaktifkan
    // Route::put('/dataadmin-password/{id}', [DataAdminController::class, 'update_password']);
    Route::resource('/datamember', DataMemberController::class);
    Route::put('/edit-password-member/{id}', [DataMemberController::class, 'edit_password']);
    Route::get('/profileAdmin', [DashboardAdminController::class, 'profile']);
    Route::put('/profileAdmin/{id}', [DashboardAdminController::class, 'edit_profile']);
    Route::put('/profilePassword/{id}', [DashboardAdminController::class, 'edit_password']);
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
