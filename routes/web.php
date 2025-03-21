<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\JadwalCheckupController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalImunisasiController;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {
    Route::get('/jadwal-imunisasi', [JadwalImunisasiController::class, 'index'])->name('jadwal-imunisasi.index');
    Route::get('/jadwal-imunisasi/create', [JadwalImunisasiController::class, 'create'])->name('jadwal-imunisasi.create');
    Route::post('/jadwal-imunisasi', [JadwalImunisasiController::class, 'store'])->name('jadwal-imunisasi.store');
});


Route::put('/profile', [userController::class, 'update'])->name('profile.update');


Route::get('/', function () {
    return view('index');
});
Route::get('/kalender', function () {
    return view('kalender');
})->name('kalender');
Route::get('/jadwal-checkup', function () {
    return view('jadwal_cu');
})->name('jadwal.cu');

// Route::get('/register', function () {
//     return view('regist');
// })->name('regist');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'] )->name('home');
    // Route::resource('user','profilController')->name('user');
});
Route::put('/profil',[App\Http\Controllers\HomeController::class, 'profil'] )->name('profil');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/pandnut', function () {
    return view('pandnut');
})->name('pandnut');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/jadwal', [JadwalCheckupController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/create', [JadwalCheckupController::class, 'create'])->name('jadwal.create');
Route::post('/jadwal', [JadwalCheckupController::class, 'store'])->name('jadwal.store');
Route::delete('/jadwal/{id}', [JadwalCheckupController::class, 'destroy'])->name('jadwal.destroy');
// Route untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/jadwal', [AdminJadwalController::class, 'index'])->name('admin.jadwal.index');
    Route::patch('/admin/jadwal/{id}', [AdminJadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::get('/admin/users', [AdminJadwalController::class, 'manageUsers'])->name('admin.users.index');
    Route::post('/admin/users', [AdminJadwalController::class, 'storeUser'])->name('admin.users.store');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/store', [AdminController::class, 'store'])->name('admin.users.store');


    Route::delete('/admin/jadwal/{id}', [AdminJadwalController::class, 'destroy'])->name('admin.jadwal.destroy');
    Route::post('/admin/jadwal', [AdminJadwalController::class, 'store'])->name('admin.jadwal.store');

    Route::get('/artikel1', function () {
        return view('artikel1');
    })->name('artikel1');
    Route::get('/artikel2', function () {
        return view('artikel2');
    })->name('artikel2');
    Route::get('/artikel3', function () {
        return view('artikel3');
    })->name('artikel3');
    Route::get('/artikel4', function () {
        return view('artikel4');
    })->name('artikel4');
    Route::get('/artikel5', function () {
        return view('artikel5');
    })->name('artikel5');
    Route::get('/artikel6', function () {
        return view('artikel6');
    })->name('artikel6');
    
});