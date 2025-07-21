<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\CandidaturasController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\EleicoesController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('register-candidato', [CandidatosController::class, 'create'])->name('register-candidato');
    Route::post('register-candidato', [CandidatosController::class, 'store']);
Route::get('lista-candidatos', [CandidatosController::class, 'show'])->name('lista-candidatos');
Route::get('edit-candidato/{id}', [CandidatosController::class, 'edit'])->name('edit-candidato');
Route::put('update-candidato/{id}', [CandidatosController::class, 'update'])->name('update-candidato');
Route::delete('delete-candidato/{id}', [CandidatosController::class, 'destroy'])->name('delete-candidato');

Route::get('register-candidatura', [CandidaturasController::class, 'create'])->name('register-candidatura');
    Route::post('register-candidatura', [CandidaturasController::class, 'store']);
Route::get('lista-candidaturas', [CandidaturasController::class, 'show'])->name('lista-candidaturas');
Route::get('edit-candidatura/{id}', [CandidaturasController::class, 'edit'])->name('edit-candidatura');
Route::put('update-candidatura/{id}', [CandidaturasController::class, 'update'])->name('update-candidatura');
Route::delete('delete-candidatura/{id}', [CandidaturasController::class, 'destroy'])->name('delete-candidatura');

Route::get('register-cargo', [CargosController::class, 'create'])->name('register-cargo');
    Route::post('register-cargo', [CargosController::class, 'store']);
Route::get('lista-cargos', [CargosController::class, 'show'])->name('lista-cargos');
Route::get('edit-cargo/{id}', [CargosController::class, 'edit'])->name('edit-cargo');
Route::put('update-cargo/{id}', [CargosController::class, 'update'])->name('update-cargo');
Route::delete('delete-cargo/{id}', [CargosController::class, 'destroy'])->name('delete-cargo');

Route::get('register-eleicao', [EleicoesController::class, 'create'])->name('register-eleicao');
    Route::post('register-eleicao', [EleicoesController::class, 'store']);
Route::get('lista-eleicoes', [EleicoesController::class, 'show'])->name('lista-eleicoes');
Route::get('edit-eleicao/{id}', [EleicoesController::class, 'edit'])->name('edit-eleicao');
Route::put('update-eleicao/{id}', [EleicoesController::class, 'update'])->name('update-eleicao');
Route::delete('delete-eleicao/{id}', [EleicoesController::class, 'destroy'])->name('delete-eleicao');

Route::get('register-partido', [PartidosController::class, 'create'])->name('register-partido');
    Route::post('register-partido', [PartidosController::class, 'store']);
Route::get('lista-partidos', [PartidosController::class, 'show'])->name('lista-partidos');
Route::get('edit-partido/{id}', [PartidosController::class, 'edit'])->name('edit-partido');
Route::put('update-partido/{id}', [PartidosController::class, 'update'])->name('update-partido');
Route::delete('delete-partido/{id}', [PartidosController::class, 'destroy'])->name('delete-partido');

Route::get('register-status', [StatusController::class, 'create'])->name('register-status');
    Route::post('register-status', [StatusController::class, 'store']);
Route::get('lista-status', [StatusController::class, 'show'])->name('lista-status');
Route::get('edit-status/{id}', [StatusController::class, 'edit'])->name('edit-status');
Route::put('update-status/{id}', [StatusController::class, 'update'])->name('update-status');
Route::delete('delete-status/{id}', [StatusController::class, 'destroy'])->name('delete-status');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
