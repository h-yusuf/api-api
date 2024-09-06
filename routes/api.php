<?php

use App\Http\Controllers\api\KaryawanController;
use App\Http\Controllers\api\MesinController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Karyawan
Route::get('/karyawanGetAll', [KaryawanController::class, 'karyawanGetAll']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::post('/karyawan/import', [ImportFileController::class, 'karyawanImport']);

// Mesin
Route::get('/mesinGetAll', [MesinController::class, 'mesinGetAll']);
Route::post('/mesin/store', [MesinController::class, 'store']);