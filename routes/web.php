<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubmateriController;
use App\Http\Controllers\SubsubmateriController;
use App\Http\Controllers\KontenssmController;
use App\Http\Controllers\BeritaController;

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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




Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function() {
        return view('welcome');
    });
    
    Route::prefix('pengelola')->group(
        function() {
            Route::get('/', [UserController::class,'index']);
            Route::get('/create', [UserController::class,'create']);
            Route::post('/', [UserController::class,'store']);
            Route::get('{id}/profil', [UserController::class,'profil']);
            Route::get('{id}/edit', [UserController::class,'edit']);
            Route::get('{id}/delete', [UserController::class,'delete'])->name('pengelola.delete');
        }
    );

    Route::prefix('materi')->group(
        function() {
            Route::get('/', [MateriController::class,'index']);
            Route::get('/create', [MateriController::class,'create']);
            Route::post('/', [MateriController::class,'store']);
            Route::get('{id}/detail', [MateriController::class,'detail'])->name('materi.detail');
            Route::get('{id}/edit', [MateriController::class,'edit']);
            Route::post('{id}/update', [MateriController::class,'update']);
            Route::get('{id}/delete', [MateriController::class,'delete'])->name('materi.delete');
        }
    );

    Route::prefix('submateri')->group(
        function() {
            Route::get('/create', [SubmateriController::class,'create']);
            Route::post('/', [SubmateriController::class,'store']);
            Route::get('{id}/detail', [SubmateriController::class,'detail'])->name('submateri.detail');
            Route::get('{id}/edit', [SubmateriController::class,'edit']);
            Route::post('{id}/update', [SubmateriController::class,'update']);
            Route::get('{id}/delete', [SubmateriController::class,'delete'])->name('submateri.delete');
        }
    );

    Route::prefix('subsubmateri')->group(
        function() {
            Route::get('/create', [SubsubmateriController::class,'create']);
            Route::post('/', [SubsubmateriController::class,'store']);
            Route::get('{id}/detail', [SubsubmateriController::class,'detail'])->name('subsubmateri.detail');
            Route::get('{id}/edit', [SubsubmateriController::class,'edit']);
            Route::post('{id}/update', [SubsubmateriController::class,'update']);
            Route::get('{id}/delete', [SubsubmateriController::class,'delete'])->name('subsubmateri.delete');
        }
    );

    Route::prefix('kontenssm')->group(
        function() {
            Route::get('/create', [KontenssmController::class,'create']);
            Route::post('/', [KontenssmController::class,'store']);
            Route::get('{id}/detail', [KontenssmController::class,'detail'])->name('kontenssm.detail');
            Route::get('{id}/edit', [KontenssmController::class,'edit']);
            Route::post('{id}/update', [KontenssmController::class,'update']);
            Route::get('{id}/delete', [KontenssmController::class,'delete'])->name('kontenssm.delete');
        }
    );

    Route::prefix('berita')->group(
        function() {
            Route::get('/', [BeritaController::class,'index']);
            Route::get('/create', [BeritaController::class,'create']);
            Route::post('/', [BeritaController::class,'store']);
            Route::get('{id}/detail', [BeritaController::class,'detail'])->name('berita.detail');
            Route::get('{id}/edit', [BeritaController::class,'edit']);
            Route::post('{id}/update', [BeritaController::class,'update']);
            Route::get('{id}/delete', [BeritaController::class,'delete'])->name('berita.delete');
        }
    );

    Route::post('/logout', [AuthController::class, 'logout']);
// });
    
