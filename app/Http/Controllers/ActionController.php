<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActionController extends Controller
{

    public function show()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');
        // dd($response->status());

        if($response->successful()){
            // dd($response->json());
            $joke = $response->json();
            // dd($joke);
            return view('joke', ['joke' => $joke]);
        } else {
            abort(500, 'Failed to retrieve data from the API.');
        }
    }
}
