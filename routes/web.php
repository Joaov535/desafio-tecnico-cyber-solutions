<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

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

    Route::get('employees', [EmployeeController::class, 'listar']);
    Route::post('employee', [EmployeeController::class, 'salvar']);
    Route::put('employee/{cpf}', [EmployeeController::class, 'alterar']);
    Route::delete('employee/{cpf}', [EmployeeController::class, 'deletar']);
});
