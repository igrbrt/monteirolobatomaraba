<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatriculaController;
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

Route::get('/', function () {
    return view('matricula');
});

Route::post('/', [MatriculaController::class, 'store'])->name('matricular');

Route::get('/dados', [MatriculaController::class, 'buscarDadosAjax'])->name('selectDadosAjax');

Route::get('/dashboard/data_rematricula', [MatriculaController::class, 'dadosRematricula'])->name('dados_rematricula');

Route::get('/dashboard/data_matricula', [MatriculaController::class, 'dadosMatricula'])->name('dados_matricula');

Route::get('/dashboard/data_antigo_matricula', [MatriculaController::class, 'dadosAntigoMatricula'])->name('dados_antigo_matricula');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/ver_aluno/{id}', [MatriculaController::class, 'getAluno'])->name('ver_aluno');

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/ver_aluno/{id}/concluir', [MatriculaController::class, 'concluir'])->name('concluir');