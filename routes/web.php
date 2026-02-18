<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EleveController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/', [EleveController::class, 'index']);
Route::get('/add', [EleveController::class, 'create']);
Route::post('/add', [EleveController::class, 'store']);

Route::get('/edit/{id}', [EleveController::class, 'edit']);
Route::post('/edit/{id}', [EleveController::class, 'update']);
Route::get('/delete/{id}', [EleveController::class, 'destroy']);





