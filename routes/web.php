<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\candidatoController;
use App\Http\Controllers\empresaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\admController;

Route::view('/', 'login');
Route::post('/validacao', [loginController::class, 'validacao']);

//ADM
Route::post('/adm/confirmacao', [admController::class, 'Confirmar']);
Route::get('/validacao2Adm/{id}', [loginController::class, 'validacao2Adm'])->name('validacao2Adm');
Route::post('/adm/todasAsEmpresas', [admController::class, 'todasAsEmpresas']);

//candidato
Route::view('/cadastroCandidato', 'cadastroCandidato');
Route::post('/candidato/cadastro', [candidatoController::class, 'cadastrar']);
Route::post('/candidato/vagasCandidatas', [candidatoController::class, 'VagasCandidatas']);
Route::get('/validacao2Candidato/{id}', [loginController::class, 'validacao2Candidato'])->name('validacao2Candidato');
Route::post('/candidato/inscrever', [candidatoController::class, 'inscricao']);


//empresa
Route::view('/cadastroEmpresa', 'cadastroEmpresa');
Route::post('/empresa/cadastro', [empresaController::class, 'cadastrar']);
Route::post('/empresa/cadastroVaga', [empresaController::class, 'cadastrarVaga']);
Route::get('/validacao2Empresa/{id}', [loginController::class, 'validacao2Empresa'])->name('validacao2Empresa');
Route::post('/empresa/vagasOcupdas', [empresaController::class, 'vagasOcupadas']);
Route::get('/empresa/todasAsVagas/{id}', [empresaController::class, 'todasAsVagas'])->name('todasAsVagas');
Route::post('/empresa/deletarVaga', [empresaController::class, 'deletarVaga']);
Route::post('/empresa/editarVaga', [empresaController::class, 'editarVaga']);
Route::put('/empresa/atualizarVaga/{id}', [empresaController::class, 'atualizarVaga'])->name('atualizarVaga');