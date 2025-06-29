<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('system.home');
    });

    Route::get('funcionario/{cpf}', [FuncionarioController::class, 'listar']);
    Route::post('funcionario', [FuncionarioController::class, 'salvar']);
    Route::put('funcionario/{cpf}', [FuncionarioController::class, 'alterar']);
    Route::delete('funcionario/{cpf}', [FuncionarioController::class, 'deletar']);
});
