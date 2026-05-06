<?php

use App\Http\Controllers\JokesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/jokes', [JokesController::class, 'getJokes']);
