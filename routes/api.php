<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExamController;

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

//Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/create-ujian', [ExamController::class, 'createUjian'])->middleware('auth:sanctum');
Route::post('/get-soal-ujian', [ExamController::class, 'getListSoalByKategori'])->middleware('auth:sanctum');
Route::post('/answers', [ExamController::class, 'jawabSoal'])->middleware('auth:sanctum');
Route::get('/get-nilai', [ExamController::class, 'hitungNilaiUjianByKategori'])->middleware('auth:sanctum');

//api content
Route::apiResource('contents', \App\Http\Controllers\Api\ContentController::class)->middleware('auth:sanctum');
//api materi
Route::apiResource('materis', \App\Http\Controllers\Api\MateriController::class)->middleware('auth:sanctum');