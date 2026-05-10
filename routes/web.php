<?php

use App\Http\Controllers\JokesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/get-stats', function () {
        return view('get_stats');
    })->name('getStats');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/second-task', function () {
    $target = Http::get('https://test.amopoint-dev.ru/testzz/testlist.html');
    return view('second_task', ['content' => $target->body()]);
});



Route::get('/retrieveJokes', [JokesController::class, 'retrieveJokesSchedule']);
