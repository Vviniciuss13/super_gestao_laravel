<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso';
});
*/

Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);
Route::get('/contato', [ContatoController::class, 'contato']);
Route::get('/login', function(){ return 'login';});

# /app
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'clientes';});
    Route::get('/fornecedores', function(){ return 'fornecedores';});
    Route::get('/produtos', function(){ return 'produtos';});
});
