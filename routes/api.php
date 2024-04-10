<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
});

Route::get('import-data', function () {
    Artisan::call('db:seed --class=DimensionSeeder');
    Artisan::call('db:seed --class=ImportDataInstrument');
    Artisan::call('db:seed --class=ImportDataUser');
    Artisan::call('db:seed --class=ImportDataAnswer');
    return 'success';
});

Route::get('data-reset', function () {
    Artisan::call('migrate:fresh');
    return 'success';
});
