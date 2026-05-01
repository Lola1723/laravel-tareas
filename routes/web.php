<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tareas', [TaskController::class,'index']);
Route::post('/tareas', [TaskController::class, 'store']);
Route::get('/eliminar/{id}', [TaskController::class, 'destroy']);
Route::get('/editar/{id}', [TaskController::class, 'edit']);
Route::post('/actualizar/{id}', [TaskController::class, 'update']);
