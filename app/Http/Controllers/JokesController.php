<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class JokesController extends Controller
{
    #[NoReturn]
    public function retrieveJokesSchedule(): void
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://official-joke-api.appspot.com/random_joke',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $newJoke = json_decode($response, true);
        Joke::create($newJoke);
    }

    public function getJokes(): \Illuminate\Database\Eloquent\Collection
    {
        return Joke::all();
    }
}
