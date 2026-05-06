<?php

use App\Http\Controllers\JokesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/second-task', function () {
    $target = Http::get('https://test.amopoint-dev.ru/testzz/testlist.html');
//    dd($target->body());
    return view('second_task', ['content' => $target->body()]);
});
Route::get('/retrieveJokes', [JokesController::class, 'retrieveJokesSchedule']);
