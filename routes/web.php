<?php

use App\Models\User;
use App\Models\Proporsi;
use App\Models\Efisiensi;
use App\Models\KeuanganNazir;
use App\Models\HasilPengelolaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\KeuanganNazirController; 

// Catatan: pengalaman => urutan program itu PENTING! soalnya ngaruh..

Auth::routes(['verify' => true]);

Route::view('/', 'landing-page');


Route::middleware('auth', 'verified')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ADMIN
Route::prefix('admin')->middleware(['admin', 'verified'])->name('admin.')->group(function() {
    Route::view('dashboard', 'admin/dashboard-admin', [
        'jumlah_user'       => User::count(),
        'proporsi_terbaik'  => Proporsi::max('nilai_total'),
        'efisiensi_terbaik' => Efisiensi::max('nilai_total'),
        'hp_terbaik'        => HasilPengelolaan::max('nilai_total'),
    ])->name('dashboard');

    Route::view('data-nazir', 'admin/data-nazir/index', [
        'user'     => User::all(),
        'keuangan' => KeuanganNazir::all()
    ])->name('data.nazir');

    Route::view('kinerja-nazir', 'admin/kinerja-nazir/index', [
        'user'             => User::all(),
        'keuangan'         => KeuanganNazir::all(),
        'proporsi'         => Proporsi::all(),
        'efisiensi'        => Efisiensi::all(),
        'hasilPengelolaan' => HasilPengelolaan::all()
    ])->name('kinerja.nazir');
});
    
// NAZIR
Route::prefix('nazir')->middleware(['auth', 'verified'])->name('nazir.')->group(function () {
    Route::view('/dashboard', 'nazir/dashboard')->name('dashboard');
    Route::view('/kinerja-nazir', 'nazir/nazir-kinerja', [
        'keuangan'         => KeuanganNazir::all(),
        'proporsi'         => Proporsi::all(),
        'efisiensi'        => Efisiensi::all(),
        'hasilPengelolaan' => HasilPengelolaan::all()
    ])->name('kinerja');

    Route::prefix('keuangan-nazir')->name('keuangan.')->group(function() {
        Route::get('/', [KeuanganNazirController::class, 'index'])->name('index');
        Route::get('/create', [KeuanganNazirController::class, 'create'])->name('create');
        Route::post('/store', [KeuanganNazirController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KeuanganNazirController::class, 'edit']);
        Route::post('/update/{id}', [KeuanganNazirController::class, 'update']);
        Route::get('/destroy/{id}', [KeuanganNazirController::class, 'destroy']);
        Route::get('/hitung/{id}', [KeuanganNazirController::class, 'hitung']);
    });
});

Route::get('/home', function() {
    if(Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('nazir.dashboard');
    }

})->name('home')->middleware('auth');

