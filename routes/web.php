<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CourseController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('training')->name('training.')->group(function() {
    Route::get('/dashboard', [TrainingController::class, 'index'])->name('dashboard');
    Route::get('/', [TrainingController::class, 'training'])->name('index');
    Route::get('/getTopik', [TrainingController::class, 'getTopik'])->name('getTopik');
    Route::post('/storeTopik', [TrainingController::class, 'storeTopik'])->name('store.topik');
    Route::delete('/deleteTopik/{id}', [TrainingController::class, 'deteleTraining'])->name('delete.topik');
});

Route::prefix('course')->name('course.')->group(function(){
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/getCourse', [CourseController::class, 'getCourse'])->name('getCourse');
    Route::post('/storeCourse', [CourseController::class, 'storeTopik'])->name('storeCourse');
    Route::delete('/deleteCourse/{id}', [CourseController::class, 'deleteCourse'])->name('delete.course');
});