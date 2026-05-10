<?php

use App\Http\Controllers\JokesController;
use App\Http\Controllers\StatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/jokes', [JokesController::class, 'getJokes']);

Route::get('/save_stats', [StatisticController::class, 'saveStatistic']);

Route::get('/show_stats', [StatisticController::class, 'getStatistic']);
