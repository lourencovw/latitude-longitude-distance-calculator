<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Helpers\Search;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function (Request $request) {
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $orderBy = $request->input('order-by');
    
    return Search::getNearbyHotels($latitude,$longitude, $orderBy);
});
