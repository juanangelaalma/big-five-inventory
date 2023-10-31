<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('roles:admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'users'])->name('admin.users');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/save', [UserController::class, 'save'])->name('admin.users.save');
        Route::get('/{user:id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user:id}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/{user:id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});

require __DIR__ . '/auth.php';
