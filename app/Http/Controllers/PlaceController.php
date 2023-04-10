<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    public function index()
    {
        return view('api');
    }

    public function store(Request $request)
    {
        $query = $request->input('places');
        
        $apiKey = env('GOOGLE_API_KEY');

        $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json';

        $params = [
            'query' => $query,
            'key' => $apiKey,
        ];

        $response = Http::get($url, $params);

        $results = $response->json()['results'];
        $formatted_results = json_encode($results, JSON_PRETTY_PRINT);

        $data = json_decode($formatted_results);
        $main_result = $data[0];

        $formatted_address = $main_result->formatted_address;
        $name = $main_result->name;
        $place_id = $main_result->place_id;

        $link = "https://search.google.com/local/writereview?placeid=".$place_id;


        return response($formatted_results)->header('Content-Type', 'application/json');
    }
}
