<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->usertype == 'admin') {
        return view('admin/dashboard');
    }
    if (Auth::user()->usertype == 'operator') {
        return view('operator/dashboard');
    }
    if (Auth::user()->usertype == 'kepsek') {
        return view('kepsek/dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index1'])->middleware(['auth', 'admin']);;
Route::get('operator/dashboard', [HomeController::class, 'index2'])->middleware(['auth', 'operator']);;
Route::get('kepsek/dashboard', [HomeController::class, 'index3'])->middleware(['auth', 'kepsek']);;

Route::resource('user', UserController::class);
Route::resource('level', LevelController::class);
