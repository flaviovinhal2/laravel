<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

// ROTAS PRODUTOS
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

// ROTAS CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
