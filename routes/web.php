<?php

use App\Models\santriModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guruController;
use App\Http\Controllers\KitabController;
use App\Http\Controllers\santriController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::middleware(['auth:sanctum'])->group(function () {
    Route::get('santri', [santriController::class, 'index'])->name('santri.index');
    Route::get('santri/create', [santriController::class, 'create'])->name('santri.create');
    Route::post('santri/store', [santriController::class, 'store'])->name('santri.store');
    Route::get('santri/edit/{id}', [santriController::class, 'edit'])->name('santri.edit');
    Route::post('santri/update/{nis}', [santriController::class, 'update'])->name('santri.update');
    Route::get('santri/delete/{id}', [santriController::class, 'delete'])->name('santri.delete');
});


route::middleware(['auth:sanctum'])->group(function () {
    Route::get('guru', [guruController::class, 'index'])->name('guru.index');
    Route::get('guru/create', [guruController::class, 'create'])->name('guru.create');
    Route::post('guru/store', [guruController::class, 'store'])->name('guru.store');
    Route::get('guru/edit/{id}', [guruController::class, 'edit'])->name('guru.edit');
    Route::post('guru/update/{id}', [guruController::class, 'update'])->name('guru.update');
    Route::get('guru/delete/{id}', [guruController::class, 'delete'])->name('guru.delete');
});


route::middleware(['auth:sanctum'])->group(function () {
    Route::get('kitab', [KitabController::class, 'index'])->name('kitab.index');
    Route::get('kitab/create', [KitabController::class, 'create'])->name('kitab.create');
    Route::post('kitab/store', [KitabController::class, 'store'])->name('kitab.store');
    Route::get('kitab/edit/{id}', [KitabController::class, 'edit'])->name('kitab.edit');
    // Route::post('kitab/update/{id}', [KitabController::class, 'update'])->name('kitab.update');
    // Route::get('kitab/delete/{id}', [KitabController::class, 'delete'])->name('kitab.delete');
});
