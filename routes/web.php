<?php

use App\Http\Controllers\AnalystController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('guest.home');

Route::get('/dashboard', function () {
    return view('guest.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/instruments', [InstrumentController::class, 'answer'])->name('instruments.answer');
    Route::post('/instruments', [InstrumentController::class, 'submitAnswers'])->name('instruments.answer.submit');
    Route::post('/instruments/submitAllAnswers', [InstrumentController::class, 'submitAllAnswers'])->name('instruments.submit.all');

    Route::get('/answers', [AnswerController::class, 'result'])->name('answers.result');
    Route::get('/answers/{answerStatusId}', [AnswerController::class, 'resultDetails'])->name('answers.result.details');
});

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'users'])->name('admin.users');
        Route::get('/{user:id}/show', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user:id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user:id}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/{user:id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('dimensions')->group(function () {
        Route::get('/', [DimensionController::class, 'index'])->name('admin.dimensions');
        Route::get('/create', [DimensionController::class, 'create'])->name('admin.dimensions.create');
        Route::post('/store', [DimensionController::class, 'store'])->name('admin.dimensions.store');
        Route::get('/{dimension:id}/edit', [DimensionController::class, 'edit'])->name('admin.dimensions.edit');
        Route::put('/{dimension:id}/update', [DimensionController::class, 'update'])->name('admin.dimensions.update');
        Route::post('/{dimension:id}/destroy', [DimensionController::class, 'destroy'])->name('admin.dimensions.destroy');
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

Route::prefix('counselor')->middleware(['auth', 'roles:counselor'])->group(function () {
    Route::get('/', [DashboardController::class, 'counselor'])->name('counselor.index');

    Route::get('/answers', [AnswerController::class, 'getUsersWithAnswers'])->name('counselor.answers');
    Route::get('/answers/{answerStatusId}', [AnswerController::class, 'resultDetailsForCounselor'])->name('counselor.answers.details');
    Route::post('/answers/filter', [AnswerController::class, 'filter'])->name('counselor.answers.filter');

    Route::get('/analyst', [AnalystController::class, 'index'])->name('counselor.analyst');
});

Route::get('/test-component', function () {
    return view(request()->component);
});

require __DIR__ . '/auth.php';
