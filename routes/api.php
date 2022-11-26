<?php

use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\SubmateriController;
use App\Http\Controllers\Api\SubsubmateriController;
use App\Http\Controllers\Api\KontenssmController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\SoalController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\PengaturanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('materi', [MateriController::class, 'index']);
Route::get('materi/{id}', [MateriController::class, 'show']);
Route::get('submateri', [SubmateriController::class, 'index']);
Route::get('subsubmateri', [SubsubmateriController::class, 'index']);
Route::get('subsubmateri/{id}', [SubsubmateriController::class, 'show']);
Route::get('kontenssm', [KontenssmController::class, 'index']);
Route::get('quiz', [QuizController::class, 'index']);
Route::get('quiz/{quiz_id}', [QuizController::class, 'questions']);
Route::get('soal', [SoalController::class, 'index']);
Route::get('berita', [BeritaController::class, 'index']);
Route::get('berita/all', [BeritaController::class, 'all']);
Route::get('berita/{id}', [BeritaController::class, 'show']);
Route::get('pengaturan', [PengaturanController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});