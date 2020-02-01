<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    protected $apiKey = "64a33d2ed50d02e1b7fa2d25fa397460";
    
    //This function fetch the weather report base on the city provided
    public function getWeather(Request $request)
    {
		$validatedData = $request->validate([
			'city' => 'required|string|',
		]);
    
		$location = $validatedData['city'];

		$queryString = http_build_query([
		  'access_key' => $this->apiKey,
		  'query' => $location,
		]);

		$ch = curl_init(sprintf('%s?%s', 'http://api.weatherstack.com/current', $queryString));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$json = curl_exec($ch);
		curl_close($ch);

		$api_result = json_decode($json, true);

		return view('result',['data' => $api_result]);
		
	}
}
