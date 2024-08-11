<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

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

Route::get('/', [TrainingController::class, 'index'])->name('training.dashboard');
Route::get('/training', [TrainingController::class, 'training'])->name('training.index');
Route::get('/training/{id}', [TrainingController::class, 'courseTraining'])->name('training.topik');
Route::post('/training/storeTopik', [TrainingController::class, 'storeTopik'])->name('training.store.topik');