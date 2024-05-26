<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatuController;
use App\Http\Controllers\DuaController;
use App\Http\Controllers\LevelController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KaryawanController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/satu', [SatuController::class, 'index'])->name('satu');
    Route::get('/dua', [DuaController::class, 'index'])->name('dua');
    Route::post('/dua/convert', [DuaController::class, 'convert'])->name('dua.convert');
    Route::resource('jabatans', JabatanController::class)->name('*', 'jabatans');
    Route::resource('levels', LevelController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('karyawans', KaryawanController::class);
});

require __DIR__.'/auth.php';
