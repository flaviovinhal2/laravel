<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () { return redirect('/produtos'); });

Route::get('/produtos', [ProdutoController::class, 'index']); // Listar
Route::post('/produtos', [ProdutoController::class, 'store']); // Salvar
Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit']); // Form Edição
Route::put('/produtos/{id}', [ProdutoController::class, 'update']); // Atualizar
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']); // Excluir

Route::get('/tema', [ProdutoController::class, 'alternarTema']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
