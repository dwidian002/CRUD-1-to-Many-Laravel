<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('auth.index')->middleware("guest");
Route::post('/login',[\App\Http\Controllers\AuthController::class,'verify'])->name('auth.verify');

Route::group(['middleware' => 'auth:user'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile',[App\Http\Controllers\DashboardController::class, 'profile'])->name('dashboard.profile');

        Route::get('/kategori',[App\Http\Controllers\KategoriCOntroller::class,'index'])->name('kategori.index');
        Route::get('/kategori/tambah',[App\Http\Controllers\KategoriCOntroller::class,'tambah'])->name('kategori.tambah');
        Route::post('/kategori/prosesTambah',[App\Http\Controllers\KategoriCOntroller::class,'prosesTambah'])->name('kategori.prosesTambah');
        Route::get('/kategori/ubah/{id}',[App\Http\Controllers\KategoriCOntroller::class,'ubah'])->name('kategori.ubah');
        Route::post('/kategori/prosesUbah',[App\Http\Controllers\KategoriCOntroller::class,'prosesUbah'])->name('kategori.prosesUbah');
        Route::get('/kategori/hapus{id}',[App\Http\Controllers\KategoriCOntroller::class,'hapus'])->name('kategori.hapus');
    });

    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout');

});
