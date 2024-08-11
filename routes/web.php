<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('registrasiForm');
Route::post('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');

Route::middleware('auth')->get('/dashboard', [TrainingController::class, 'index'])->name('dashboard');

Route::middleware('auth')->prefix('training')->name('training.')->group(function() {
    Route::get('/', [TrainingController::class, 'training'])->name('index');
    Route::get('/getTopik', [TrainingController::class, 'getTopik'])->name('getTopik');
    Route::post('/storeTopik', [TrainingController::class, 'storeTopik'])->name('store.topik');
    Route::delete('/deleteTopik/{id}', [TrainingController::class, 'deteleTraining'])->name('delete.topik');
});

Route::middleware('auth')->prefix('course')->name('course.')->group(function(){
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/getCourse', [CourseController::class, 'getCourse'])->name('getCourse');
    Route::post('/storeCourse', [CourseController::class, 'storeTopik'])->name('storeCourse');
    Route::delete('/deleteCourse/{id}', [CourseController::class, 'deleteCourse'])->name('delete.course');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');