<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/', [AuthenticatedSessionController::class, 'create']);
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('index', function () {
    if (Auth::user()->usertype == 'admin') {
        return view('admin/index');
    }
    if (Auth::user()->usertype == 'operator') {
        return view('operator/index');
    }
    if (Auth::user()->usertype == 'kepsek') {
        return view('kepsek/index');
    }
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/index', [HomeController::class, 'index1'])->middleware(['auth', 'admin']);;
Route::get('operator/index', [HomeController::class, 'index2'])->middleware(['auth', 'operator']);;
Route::get('kepsek/index', [HomeController::class, 'index3'])->middleware(['auth', 'kepsek']);;

Route::resource('user', UserController::class);
Route::resource('level', LevelController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('books', BooksController::class);
