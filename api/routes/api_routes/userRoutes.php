<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthController;

Route::prefix('users')
    ->whereNumber('id')
    ->group(function () {

        Route::controller(UserController::class)
            ->group(function () {

                Route::post('create','store');
                Route::put('','update');
                Route::delete('','destroy');

            });
        Route::controller(AuthController::class)
            ->group(function () {

                Route::post('login','login');
                Route::post('logout','logout');
                Route::post('me','me')->middleware('auth:sanctum');

            });

    });
