<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FornecedorController;
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

Route::resources([
    'categoria' => \App\Http\Controllers\CategoriaController::class,
    'fornecedor' => \App\Http\Controllers\FornecedorController::class,
    'produto' => \App\Http\Controllers\ProdutoController::class,
]);


Route::get("/", [HomeController::class, "index"]);

Route::get("/detalhe/{id}", [HomeController::class, "detalhe"]);

Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/carrinho',
    [CompraController::class, 'vercarrinho'])->name('carrinho');

Route::get('/carrinho/vercarrinho',
    [CompraController::class, 'vercarrinho'])->name('vercarrinho');


/* Não precisei utilizar
Route::get('/adicionar/{id}',
    [CompraController::class, 'adicionar'])->name('adicionar');
*/

Route::get('/carrinho/adicionar/{id}',
    [CompraController::class, 'adicionar_no_carrinho'])->name('adicionar_no_carrinho');
/* Não precisei utilizar
Route::get('/remover/{id}',
    [CompraController::class, 'remover'])
    ->name('remover');
*/
Route::get('/carrinho/remover/{id}',
    [CompraController::class, 'remover_do_carrinho'])
    ->name('remover_do_carrinho');

Route::get('/finalizar',
    [CompraController::class, 'finalizar'])
    ->name('finalizar');

require __DIR__.'/auth.php';
