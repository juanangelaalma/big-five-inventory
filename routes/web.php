<?php

use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'users'])->name('admin.users');
        Route::get('/{user:id}/details', [UserController::class, 'details'])->name('admin.users.details');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/save', [UserController::class, 'save'])->name('admin.users.save');
        Route::get('/{user:id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user:id}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/{user:id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('instruments')->group(function () {
        Route::get('/', [InstrumentController::class, 'index'])->name('admin.instruments');
        Route::get('/create', [InstrumentController::class, 'create'])->name('admin.instruments.create');
        Route::post('/store', [InstrumentController::class, 'store'])->name('admin.instruments.store');
        Route::get('/{instrument:id}/edit', [InstrumentController::class, 'edit'])->name('admin.instruments.edit');
        Route::put('/{instrument:id}/update', [InstrumentController::class, 'update'])->name('admin.instruments.update');
        Route::post('/{instrument:id}/destroy', [InstrumentController::class, 'destroy'])->name('admin.instruments.destroy');
    });
});

require __DIR__ . '/auth.php';
