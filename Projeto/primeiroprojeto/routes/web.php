<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "welcome"]);
Route::get('/Exemplo', [HomeController::class, "exemplo"]);
Route::post('/Resultado', [HomeController::class, "resultado"]);
Route::get('/Exercicio1', [HomeController::class, "exercicio1"]);
Route::post('/Resultado1', [HomeController::class, "resultado1"]);

