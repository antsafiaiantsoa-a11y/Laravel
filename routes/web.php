<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;

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






Route::get('/', [EleveController::class, 'index']);
Route::get('/add', [EleveController::class, 'create']);
Route::post('/add', [EleveController::class, 'store']);

Route::get('/edit/{id}', [EleveController::class, 'edit']);
Route::post('/edit/{id}', [EleveController::class, 'update']);
Route::get('/delete/{id}', [EleveController::class, 'destroy']);



Route::resource('matieres', MatiereController::class);
Route::resource('notes', NoteController::class);





