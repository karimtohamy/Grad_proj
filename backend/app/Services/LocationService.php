<?php

namespace App\Services;

use Http;

class LocationService
{
    public static function revreseLocation($lat, $long)
    {
        $url = "https://us1.locationiq.com/v1/reverse?key=" . env('GEO_LOCATION_API') . "&lat=$lat&lon=$long&format=json&";
        $response = Http::get($url);
        return $response->json();
    }
}
