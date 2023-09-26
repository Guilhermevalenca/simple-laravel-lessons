<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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

                Route::middleware('auth:sanctum')
                    ->group(function () {

                        Route::post('logout','logout');
                        Route::post('me','me');

                    });

            });

        Route::post('tests',function (Request $request) {
            return 'success';
            //ability: só precisa ter uma habilidade dentre as demais por isso é menos restritivo
            //abilities: é necessario que você tenha todas as habilidades por isso é o mais restritivo
        })->middleware('auth:sanctum','abilities:success,error,tests');

    });
