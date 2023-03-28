<?php

namespace App\Helpers;
use DB;

class Search
{
    public static function getNearbyHotels(float $latitude, float $longitude, string $orderby = "distance")
    {
        $earthRadius = 6371; // km

        $hotels = DB::table('hotels')
            ->select(
                'name',
                'latitude',
                'longitude',
                'price',
                DB::raw("
                (6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance 
                ")
            )
            ->orderBy($orderby)
            ->get();
            
        return self::render($hotels->toArray());
    }

    public static function render(array $hotels)
    {
        $start = "<li>";
        $end = "</li>";
        $response = "";

        for ($i=0; $i < count($hotels); $i++) { 
            $distance = round($hotels[$i]->distance,2);
            $price = round($hotels[$i]->price/100,2);
            $response = $response. "{$start}{$hotels[$i]->name}, {$distance} KM, {$price} EUR {$end}";
        }

        return $response;
    }
}
