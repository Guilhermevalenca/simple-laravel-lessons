<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::prefix('todo')
    ->controller(TodoController::class)
    ->whereNumber('id')
    ->group(function () {

       Route::get('','index');
       Route::get('{id}','show');
       Route::post('','store');
       Route::put('{id}','update');
       Route::patch('{id}','updateStatus');
       Route::delete('','destroy');

    });
