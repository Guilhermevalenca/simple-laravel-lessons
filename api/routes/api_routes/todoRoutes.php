<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('todo',[TodoController::class, 'index']);
Route::post('todo',[TodoController::class, 'create']);
Route::put('');
Route::patch('');
Route::delete('');
