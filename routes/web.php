<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/todo', [TodoController::class, 'store']);
Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/{id}', [TodoController::class, 'show']);
Route::put('/todo/{id}', [TodoController::class, 'update']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
