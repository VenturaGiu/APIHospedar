<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicoController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->name('api.')->group(function(){
    //Rota para listar todos os médicos
    Route::get('/medicos', [MedicoController::class, 'listar'])->name('medicos');
    //Rota para listar apenas os médicos de determinado id
    Route::get('/medicos/{id}', [MedicoController::class, 'listarId'])->name('id_medico');
    //Rota para listar apenas os médicos de determinado crm
    Route::get('/medicos/crm/{crm}', [MedicoController::class, 'listarCrm'])->name('crm_medico');
    //Rota para listar apenas os médicos com determinado nome
    Route::get('/medicos/nome/{nome}', [MedicoController::class, 'listarNome'])->name('nome_medico');
    //Rota para add um médico
    Route::post('/medicos', [MedicoController::class, 'add'])->name('add_medico');
    //Rota para Update pelo id
    Route::put('/medicos/{id}', [MedicoController::class, 'update'])->name('update_medico');
    //Rota para deletar 
    Route::delete('/medicos/{id}', [MedicoController::class, 'delete'])->name('delete_medico');
});