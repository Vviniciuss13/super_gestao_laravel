<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso';
});
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login', function(){ return 'login';})->name('site.login');

# /app
Route::prefix('/app')->group(function() {
    Route::middleware('log.acesso', 'autenticacao')->get('/clientes', function(){ return 'clientes';})->name('app.clientes');
    Route::middleware('log.acesso', 'autenticacao')->get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::middleware('log.acesso', 'autenticacao')->get('/produtos', function(){ return 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});