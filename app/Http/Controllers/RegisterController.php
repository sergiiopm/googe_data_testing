<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use OutscraperClient;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $query  = $request->input('company');

        $client = new OutscraperClient(env('OUTSCRAPER_KEY'));
        $results = $client->google_maps_search(
            [$query], 
            limit: 2,
            language: 'es',
            region: 'ES'
        );

        $count = count($results);
        $review_link = "https://search.google.com/local/writereview?placeid=";

        return view('/register', [
            'results' => $results,
            'count' => $count,
            'review_uri'=> $review_link,
        ]);
    }

    public function index()
    {
        return view('register', [
            'results' => false,
        ]);
    }

    
}
